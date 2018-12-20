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
    public function test()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pilot-payflowpro.paypal.com",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<XMLPayRequest Timeout=\"30\" version = \"2.0\" xmlns=\"http://www.paypal.com/XMLPay\">\r\n  <RequestData>\r\n      <Vendor>armeniatree1994</Vendor>\r\n      <Partner>VeriSign</Partner>\r\n      <Transactions>\r\n           <Transaction>\r\n               <Sale>\r\n                    <PayData>\r\n                         <Invoice>\r\n                         \t  <InvNum>99999</InvNum>\r\n                         \t  <CustIP>192.168.100.31</CustIP>\r\n\t\t\t\t\t\t\t  <BillTo>\r\n\t\t\t\t\t\t\t\t<Address>\r\n\t\t\t\t\t\t\t\t\t<Street>123 4th street</Street>\r\n\t\t\t\t\t\t\t\t\t<City>San Jose</City>\r\n\t\t\t\t\t\t\t\t\t<State>CA</State>\r\n\t\t\t\t\t\t\t\t\t<Zip>95032</Zip>\r\n\t\t\t\t\t\t\t\t\t<Country>USA</Country>\r\n\t\t\t\t\t\t\t\t</Address>\r\n\t\t\t\t\t\t\t  </BillTo>\r\n\t\t\t\t\t\t\t  <ShipTo>\r\n\t\t\t\t\t\t\t\t <Address>\r\n\t\t\t\t\t\t\t\t\t <Street>123 4th street</Street>\r\n\t\t\t\t\t\t\t\t\t <City>San Jose</City>\r\n\t\t\t\t\t\t\t\t\t <State>CA</State>\r\n\t\t\t\t\t\t\t\t\t <Zip>95032</Zip>\r\n\t\t\t\t\t\t\t\t\t <Country>USA</Country>\r\n\t\t\t\t\t\t\t\t </Address>\r\n\t\t\t\t\t\t\t  </ShipTo>\r\n                              <NationalTaxIncl>false</NationalTaxIncl>\r\n                              <TotalAmt>1.00</TotalAmt>\r\n                         </Invoice>\r\n                         <Tender>\r\n                              <Card>\r\n                                   <CardType>visa</CardType>\r\n                                   <CardNum>4111111111111111</CardNum>\r\n                                   <CVNum>123</CVNum>\r\n                                   <ExpDate>201912</ExpDate>\r\n                                   <NameOnCard/>\r\n                              </Card>\r\n                         </Tender>\r\n                    </PayData>\r\n               </Sale>\r\n           </Transaction>\r\n      </Transactions>\r\n  </RequestData>\r\n   <RequestAuth>\r\n      <UserPass>\r\n           <User>armeniatree1994</User>\r\n           <Password>Begreen30</Password>\r\n      </UserPass>\r\n  </RequestAuth>\r\n</XMLPayRequest>\r\n",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/xml",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        #$response = json_decode($response, true);;
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            var_dump("cURL Error #:" . $err);
        } else {
            var_dump($response);
        }

        return $this->render('paypal/test.html.twig', [
            'response' => $response
        ]);
    }
}