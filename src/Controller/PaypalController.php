<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Paypal;

class PaypalController extends AbstractController
{

    /**
     * @Route("/single", name="single")
     */
    public function single(Paypal $paypal)
    {

        $message = $paypal->runSingle();
        var_dump($message);exit;

        return $this->render('paypal/single.html.twig', [
            'text' => 'good'
        ]);
    }

    /**
     * @Route("/execute", name="execute")
     */
    public function execute(Paypal $paypal)
    {

        var_dump($_GET);exit;
        $message = $paypal->execute();
        var_dump($message);exit;

        return $this->render('paypal/execute.html.twig', [
            'text' => 'good'
        ]);
    }
}