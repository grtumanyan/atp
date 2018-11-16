<?php

namespace App\Service;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Agreement;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;

class Paypal
{

    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
//                'ATQGqWmetDQNwKA3iQEUWkziDB2a9J4Dmv_3iy3JJJ-gu0IMc0mw7NXrKGj9tStAMRBSQWYlGwUlWbIJ',     // ClientID
//                'EDOOUaHu1jfbPDjgb8AOz3GM37GzBLosXqCctJgnbGqviUgE3kLMtkSEt0BMfBsvPfEuemOdPKoyki9v'      // ClientSecret
                  'Aa9dJob1Wi2N3TtYTH1oW_mMpPw2damRJjp4SWbvWIlJqIU05fX4ogmFu4gbY4Ol2mxWEN3mPzKtWHiD',     // ClientID
               'EIjK-uPizB1x_FVbEpViMO8Hn2BEBFiPrD7j1e3RjKvLGg5RmYjr5QZeDRnNacr4jco1uX8Be5BaFlJj'      // ClientSecret
            )
        );
    }

    public function runSingle($donation)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($donation->getAmount().'.00');
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://104.248.253.238/execute")
            ->setCancelUrl("http://104.248.253.238/error");

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);

            header("Location: ".$payment->getApprovalLink());
            die();
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            return ['Failed!', $ex->getData()];
        }
    }

    public function execute($data)
    {

        try {
            $payment = Payment::get($data['paymentId'], $this->apiContext);
        } catch (Exception $ex) {

            var_dump("Get Payment", "Payment", null, null, $ex);
            exit(1);
        }
var_dump($payment->getTransactions());exit;
//        if (isset($data['success']) && $payment->getState() == 'created') {
        if ($payment->getState() == 'created') {

            $paymentId = $data['paymentId'];
            $payment = Payment::get($paymentId, $this->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($data['PayerID']);

            $transaction = new Transaction();
            $amount = new Amount();

            $amount->setCurrency('USD');
            $amount->setTotal(10);
            $transaction->setAmount($amount);

            $execution->addTransaction($transaction);

            try {

                $result = $payment->execute($execution, $this->apiContext);

                #var_dump("Executed Payment", "Payment", $payment->getId(), $execution, $result);

                try {
                    $payment = Payment::get($paymentId, $this->apiContext);
                } catch (Exception $ex) {

                    var_dump("Get Payment", "Payment", null, null, $ex);
                    exit(1);
                }
            } catch (Exception $ex) {

                var_dump("Executed Payment", "Payment", null, null, $ex);
                exit(1);
            }

            #var_dump("Get Payment", "Payment", $payment->getId(), null, $payment);

            return $payment;
        } else {

            var_dump("User Cancelled the Approval", null);
            exit;
        }
    }

    public function createPlan($donation)
    {
        $plan = new Plan();

        $plan->setName('Month Donation Plan')
            ->setDescription($donation->getFirstName().' '.$donation->getLastName())
            ->setType('fixed');

        $paymentDefinition = new PaymentDefinition();

        $paymentDefinition->setName('Regular Payments')
            ->setType('REGULAR')
            ->setFrequency('Month')
            ->setFrequencyInterval("1")
            ->setCycles("12")
            ->setAmount(new Currency(array('value' => $donation->getAmount(), 'currency' => 'USD')));

        $merchantPreferences = new MerchantPreferences();

        $merchantPreferences->setReturnUrl("http://104.248.253.238/agreement?success=true")
            ->setCancelUrl("http://104.248.253.238/agreement?success=false")
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0")
            ->setSetupFee(new Currency(array('value' => 1, 'currency' => 'USD')));

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        $request = clone $plan;

        try {
            $output = $plan->create($this->apiContext);
        } catch (Exception $ex) {

            var_dump("Created Plan", "Plan", null, $request, $ex);
            exit(1);
        }

        #var_dump("Created First Plan", "Plan", $output->getId(), $request, $output);

        return $output;

    }

    public function activatePlan($createdPlan)
    {

        try {
            $patch = new Patch();

            $value = new PayPalModel('{
               "state":"ACTIVE"
             }');

            $patch->setOp('replace')
                ->setPath('/')
                ->setValue($value);
            $patchRequest = new PatchRequest();
            $patchRequest->addPatch($patch);

            $createdPlan->update($patchRequest, $this->apiContext);

            $plan = Plan::get($createdPlan->getId(), $this->apiContext);
        } catch (Exception $ex) {

            var_dump("Updated the Plan to Active State", "Plan", null, $patchRequest, $ex);
            exit(1);
        }

         #var_dump("Updated the Plan to Active State", "Plan", $plan->getId(), $patchRequest, $plan);

        return $plan;


    }

    public function runAgreement($createdPlan)
    {
        $agreement = new Agreement();

        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate('2019-06-17T9:45:04Z');

        $plan = new Plan();
        $plan->setId($createdPlan->getId());
        $agreement->setPlan($plan);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        $request = clone $agreement;

        try {

            $agreement = $agreement->create($this->apiContext);

            $approvalUrl = $agreement->getApprovalLink();
            header("Location: ".$approvalUrl);
            die();

        } catch (Exception $ex) {

            var_dump("Created Billing Agreement.", "Agreement", null, $request, $ex);
            exit(1);
        }

        #var_dump("Created Billing Agreement. Please visit the URL to Approve.", "Agreement", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $agreement);

        return $agreement;

    }

    public function executeAgreement($data)
    {
        if (isset($data['success']) && $data['success'] == 'true') {
            $token = $data['token'];
            $agreement = new Agreement();
            try {

                $agreement->execute($token, $this->apiContext);
            } catch (Exception $ex) {

                var_dump("Executed an Agreement", "Agreement", $agreement->getId(), $data['token'], $ex);
                exit(1);
            }

            #var_dump("Executed an Agreement", "Agreement", $agreement->getId(), $data['token'], $agreement);

            try {
                $agreement = Agreement::get($agreement->getId(), $this->apiContext);
            } catch (Exception $ex) {

                var_dump("Get Agreement", "Agreement", null, null, $ex);
                exit(1);
            }

            #var_dump("Get Agreement", "Agreement", $agreement->getId(), null, $agreement);
            return true;
        } else {

            var_dump("User Cancelled the Approval", null);
        }

    }


}