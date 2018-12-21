<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PaypalPayFlow;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Donation;

class PaypalPayFlowController extends AbstractController
{
    /**
     * @Route("/singlepayflow/{id}", name="singlepayflow")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function onetime(Request $request)
    {
        $id = $request->attributes->get('id');

        $donation = $this->getDoctrine()
            ->getRepository(Donation::class)
            ->findOneById($id);

        $paypal = new PaypalPayFlow();
        $result = $paypal->runSingle($donation);
        if($result == 0){
            return $this->redirectToRoute('donepayflow', array('code' => $result ));
        }else{
            return $this->redirectToRoute('errorpayflow', array('code' => $result ));
        }
    }

    /**
     * @Route("/errorpayflow", name="errorpayflow")
     * @param Request $request
     */
    public function error(Request $request)
    {
        $code = $request->attributes->get('code');
        var_dump("Sorry something went wrong. See in error code. Code: ".$code);exit;
    }

    /**
     * @Route("/donepayflow", name="donepayflow")
     * @param Request $request
     */
    public function done(Request $request)
    {
        $code = $request->attributes->get('code');
        var_dump("Your application has been approved, thank you for your donation.");exit;
    }
}