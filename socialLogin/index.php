<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome Page</h1>

</body>
</html>
<?php

#echo $_GET["platform"];
use Factory\PlatformFactory;
use Platform\Twitch;
use Platform\Google;

require_once 'Factories/PlatformFactory.php';
require_once 'Platforms/Google.php';
require_once 'Platforms/Twitch.php';
require_once 'Platforms/Facebook.php';
require_once 'Builders/Facebook.php';
require_once 'Builders/Google.php';
require_once 'Builders/Twitch.php';
$factory = new PlatformFactory($_GET["platform"]);

echo $factory->getToken();
?>