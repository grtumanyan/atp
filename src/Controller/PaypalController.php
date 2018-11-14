<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Paypal;
use Symfony\Component\HttpFoundation\Request;

class PaypalController extends AbstractController
{

    /**
     * @Route("/onetime/{amount}", name="onetime")
     */
    public function onetime(Paypal $paypal)
    {
        $request = Request::createFromGlobals();
        $amount = $request->query->get('amount');

        $paypal->runSingle($amount);
    }

    /**
     * @Route("/execute", name="execute")
     */
    public function execute(Paypal $paypal)
    {
        $payment = $paypal->execute($_GET);

        var_dump($payment->getState());exit;

        return $this->render('paypal/execute.html.twig', [
            'text' => 'good'
        ]);
    }

    /**
     * @Route("/plan", name="plan")
     */
    public function plan(Paypal $paypal)
    {

        $output = $paypal->createPlan();
        $plan = $paypal->activatePlan($output);
        $agreement = $paypal->runAgreement($plan);
        var_dump($agreement);exit;

        return $this->render('paypal/plan.html.twig', [
            'text' => 'good'
        ]);
    }

    /**
     * @Route("/agreement", name="agreement")
     */
    public function agreement(Paypal $paypal)
    {
        $response = $paypal->executeAgreement($_GET);

        var_dump($response);exit;

        return $this->render('paypal/execute.html.twig', [
            'text' => 'good'
        ]);
    }
}