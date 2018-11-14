<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Paypal;

class PaypalController extends AbstractController
{

    /**
     * @Route("/onetime", name="onetime")
     */
    public function onetime(Paypal $paypal)
    {

        $message = $paypal->runSingle();
        var_dump($message);exit;

        return $this->render('paypal/onetime.html.twig', [
            'text' => 'good'
        ]);
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

        $plan = $paypal->createPlan();
        var_dump($plan);exit;

        return $this->render('paypal/plan.html.twig', [
            'text' => 'good'
        ]);
    }

    /**
     * @Route("/agreement", name="agreement")
     */
    public function agreement(Paypal $paypal)
    {

        $agreement = $paypal->runAgreement($_GET);

        var_dump($agreement);exit;

        return $this->render('paypal/execute.html.twig', [
            'text' => 'good'
        ]);
    }
}