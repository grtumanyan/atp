<?php

namespace App\Service;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;

class Paypal
{

    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ATQGqWmetDQNwKA3iQEUWkziDB2a9J4Dmv_3iy3JJJ-gu0IMc0mw7NXrKGj9tStAMRBSQWYlGwUlWbIJ',     // ClientID
                'EDOOUaHu1jfbPDjgb8AOz3GM37GzBLosXqCctJgnbGqviUgE3kLMtkSEt0BMfBsvPfEuemOdPKoyki9v'      // ClientSecret
            )
        );

        $this->apiContext->setConfig(
            array(
                'log.LogEnabled' => true,
                'log.FileName' => 'PayPal.log',
                'log.LogLevel' => 'DEBUG'
            )
        );
    }

    public function runSingle()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('10.00');
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
            #var_dump($payment);exit;

            header("Location: ".$payment->getApprovalLink());
            die();
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
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

                var_dump("Executed Payment", "Payment", $payment->getId(), $execution, $result);

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

            var_dump("Get Payment", "Payment", $payment->getId(), null, $payment);

            return $payment;
        } else {

            var_dump("User Cancelled the Approval", null);
            exit;
        }
    }

//    public function runPlan()
//    {
//
//        $plan = new Plan();
//
//        $plan->setName('Month Plan')
//            ->setDescription('Template creation.')
//            ->setType('fixed');
//
//        $paymentDefinition = new PaymentDefinition();
//
//        $paymentDefinition->setName('Regular Payments')
//            ->setType('REGULAR')
//            ->setFrequency('Month')
//            ->setFrequencyInterval("2")
//            ->setCycles("12")
//            ->setAmount(new Currency(array('value' => 100, 'currency' => 'USD')));
//
//        $merchantPreferences = new MerchantPreferences();
//
//        $merchantPreferences->setReturnUrl("https://example.com/ExecuteAgreement.php?success=true")
//            ->setCancelUrl("https://example.com/ExecuteAgreement.php?success=false")
//            ->setAutoBillAmount("yes")
//            ->setInitialFailAmountAction("CONTINUE")
//            ->setMaxFailAttempts("0");
//            //->setSetupFee(new Currency(array('value' => 1, 'currency' => 'USD')));
//
//
//        $plan->setPaymentDefinitions(array($paymentDefinition));
//        $plan->setMerchantPreferences($merchantPreferences);
//
//        $request = clone $plan;
//
//        try {
//            $output = $plan->create($this->apiContext);
//        } catch (Exception $ex) {
//
//
//            var_dump($ex);
//            exit(1);
//        }
//
//        var_dump($output);exit;
//
//
//    }

}