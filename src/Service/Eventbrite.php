<?php

namespace App\Service;

class Eventbrite
{

    private $token;

    public function __construct()
    {
        $this->token = 'XQIUIEBAF5CM3MMOITNR';
    }

    public function get()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.eventbriteapi.com/v3/users/me/owned_events/?token=".$this->token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $response = (json_decode($response, true));
        curl_close($curl);
        return $response;
    }

}