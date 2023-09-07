<?php
namespace Platform;

class Twitch {

    private $config = null;
    public function __construct() {
        $this->config = new \Builder\Twitch();
    }

    public function getToken(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->config->token_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id='.$this->config->client_id.'&client_secret='.$this->config->client_secret.'&grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return  $response;
    }


}

