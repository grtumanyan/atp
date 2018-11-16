<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Paypal;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Donation;

class PaypalController extends AbstractController
{
    /**
     * @Route("/onetime/{id}", name="onetime")
     */
    public function onetime(Request $request)
    {
        $request = Request::createFromGlobals();
        $id = $request->query->get('id');

        $donation = $this->getDoctrine()
            ->getRepository(Donation::class)
            ->findOneById($id);

        $paypal = new Paypal();
        $paypal->runSingle($donation);
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
     * @Route("/plan/{id}", name="plan")
     */
    public function plan(Paypal $paypal, Request $requst)
    {

        $request = Request::createFromGlobals();
        $id = $request->query->get('id');

        $donation = $this->getDoctrine()
            ->getRepository(Donation::class)
            ->findOneById($id);

        $output = $paypal->createPlan($donation);
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