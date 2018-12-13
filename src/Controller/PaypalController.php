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

    /**
     * @Route("/test", name="test")
     */
    public function test(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.paypal.com/XMLPay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<XMLPayRequest Timeout=\"30\" version = \"2.0\" xmlns=\"http://www.paypal.com/XMLPay\">\r\n  <RequestData>\r\n      <Vendor>armeniatree1994</Vendor>\r\n      <Partner>VeriSign</Partner>\r\n      <Transactions>\r\n           <Transaction>\r\n               <Sale>\r\n                    <PayData>\r\n                         <Invoice>\r\n                              <NationalTaxIncl>false</NationalTaxIncl>\r\n                              <TotalAmt>50.00</TotalAmt>\r\n                         </Invoice>\r\n                         <Tender>\r\n                              <Card>\r\n                                   <CardType>mastercard</CardType>\r\n                                   <CardNum>9999888877772222</CardNum>\r\n                                   <ExpDate>209912</ExpDate>\r\n                                   <NameOnCard>Edward Someone</NameOnCard>\r\n                              </Card>\r\n                         </Tender>\r\n                    </PayData>\r\n               </Sale>\r\n           </Transaction>\r\n      </Transactions>\r\n  </RequestData>\r\n   <RequestAuth>\r\n      <UserPass>\r\n           <User>armeniatree1994</User>\r\n           <Password>Begreen20</Password>\r\n      </UserPass>\r\n  </RequestAuth>\r\n</XMLPayRequest>",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            var_dump("cURL Error #:" . $err);
        } else {
            var_dump($response);
        }
        return ['message'];
    }
}