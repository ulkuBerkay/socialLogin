<?php
require_once 'Builders/Twitch.php';
$client = new \Builder\Twitch();
$client_id = $client->client_id;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<a href="https://id.twitch.tv/oauth2/authorize?response_type=code&client_id=<?php echo $client_id ?>&redirect_uri=http://localhost/socialLogin/index.php&scope=user:read:email&state=c3ab8aa609ea11e793ae92361f002671">Connect with Twitch</a>
</body>
</html>
