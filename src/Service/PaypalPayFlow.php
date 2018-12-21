<?php

namespace App\Service;

class PaypalPayFlow
{

    public function runSingle($donation)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://payflowpro.paypal.com",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<XMLPayRequest Timeout=\"30\" version = \"2.0\" xmlns=\"http://www.paypal.com/XMLPay\">\n    <RequestData>\n        <Vendor>armeniatree1994</Vendor>\n        <Partner>VeriSign</Partner>\n        <Transactions>\n            <Transaction>\n                <Sale>\n                    <PayData>\n                        <Invoice>\n                            <InvNum>".$donation->getId()."</InvNum>\n                            <NationalTaxIncl>false</NationalTaxIncl>\n                            <TotalAmt>".$donation->getAmount().".00</TotalAmt>\n                        </Invoice>\n                        <Tender>\n                            <Card>\n                                <CardType>".$donation->getAccountType()."</CardType>\n                                <CardNum>".$donation->getAccountNumber()."</CardNum>\n                                <CVNum>".$donation->getCvv()."</CVNum>\n                                <ExpDate>".$donation->getExpiryYear().$donation->getExpiryMonth()."</ExpDate>\n                                <NameOnCard/>\n                            </Card>\n                        </Tender>\n                    </PayData>\n                </Sale>\n            </Transaction>\n        </Transactions>\n    </RequestData>\n    <RequestAuth>\n        <UserPass>\n            <User>BenFrunjyan</User>\n            <Password>Begreen30</Password>\n        </UserPass>\n    </RequestAuth>\n</XMLPayRequest>",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/xml",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $xml = simplexml_load_string($response);
        $json_string = json_encode($xml);
        $result_array = json_decode($json_string, TRUE);
        $code = $result_array["ResponseData"]["TransactionResults"]["TransactionResult"]["Result"];

        return $code;
    }

}