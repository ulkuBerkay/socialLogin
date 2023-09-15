<?php
#var_dump($_GET);

$curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.twitch.tv/helix/users?login=twitchdev&scope=user:read:email',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer urj5ofteycp4b2v5sjmv0vv66zesb4',
            'Client-Id: wc0we76pzhmn09rwk8vnpiah9v2zdv',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    var_dump(json_decode($response));




