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
        $error = $paypal->runSingle($donation);
        return $this->error($error[1]);
    }

    /**
     * @Route("/execute", name="execute")
     */
    public function execute(Paypal $paypal)
    {
        $payment = $paypal->execute($_GET);

        return $this->done($payment->getId());
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
        $resp = $paypal->runAgreement($plan);
        return $this->error;
    }

    /**
     * @Route("/agreement", name="agreement")
     */
    public function agreement(Paypal $paypal)
    {
        $response = $paypal->executeAgreement($_GET);

        if($response[0] = false){return $this->error($response[1]);}
        else{
            return $this->done();
        }
    }

    /**
     * @Route("/error", name="error")
     */
    public function error($data = null)
    {

        return $this->render('paypal/error.html.twig', [
            'error' => $data
        ]);
    }

    /**
     * @Route("/done", name="done")
     */
    public function done($id)
    {
        return $this->render('paypal/done.html.twig', [
            'id' => $id
        ]);
    }
}