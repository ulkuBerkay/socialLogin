<?php
namespace Platform;

class Twitch {

    private $config = null;
    public  $access_token = null;
    public function __construct() {
        $this->config = new \Builder\Twitch();
    }

    public function authanticate(){
        #return $this->config;
        #return "Twitch";
        return $this->getToken();
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

       #die('client_id='.$this->config->client_id.'&client_secret='.$this->config->client_secret.'&grant_type=client_credentials');

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        #var_dump($response);
        #exit();
        $this->access_token = $response->access_token; 
        return $this->getUser();
        /* return  $response;
        
        if($response->access_token){
            $this->access_token = $response->access_token; 
            return $this->token_information();          
        } */
    }

    public function token_information(){
        $authorize = "https://id.twitch.tv/oauth2/authorize?response_type=code&client_id=".$this->config->client_id."&redirect_uri=http://localhost:8080/socialLogin/login.php&scope=channel%3Amanage%3Apolls+channel%3Aread%3Apolls&state=c3ab8aa609ea11e793ae92361f002671";
        header('Location: '.$authorize);
        #return $authorize;       
    }

    public function authorize() {
        if (!isset($_GET['code'])) {
            $authorize_url = 'https://id.twitch.tv/oauth2/authorize'.'?client_id='.$client_id.'&redirect_uri='.$redirect_uri.'&response_type=code'.'&scope=user:read:email'; 
        
            header('Location: '.$authorize_url);
            exit;
        }        
    }

    public function getUser(){

        return "https://id.twitch.tv/oauth2/authorize?response_type=code&client_id=".$this->config->client_id."&redirect_uri=http://localhost:8080/socialLogin/login.php&scope=user:read:email&state=c3ab8aa609ea11e793ae92361f002671";


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.twitch.tv/helix/users?login=twitchdev',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$this->access_token,
            'Client-Id: '.$this->config->client_id,
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response);

    }

    public function getEmail() {
        $emailUrl = 'https://api.twitch.tv/helix/users?id='.$userData->data[0]->id;
        $emailHeaders = array ("Authorization: Bearer $access_token", "Client-ID: $client_id");
        
        $emailCh = curl_init();
        curl_setopt($emailCh, CURLOPT_URL, $emailUrl);
        curl_setopt($emailCh, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($emailCh, CURLOPT_HTTPHEADER, $emailHeaders);
        
        $emailResult = curl_exec($emailCh);
        curl_close($emailCh);
        
        $emailData = json_decode($emailResult);
        
        $email = $emailData->data[0]->email;
        
        echo "Kullanıcının e-posta adresi: ".$email;        
    }

}

