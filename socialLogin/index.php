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

var_dump($factory->authanticate());
/* echo $factory->getToken();
echo $factory->getUser(); */
/* echo $factory->token_information();
echo $factory->authorize();
echo $factory->getEmail(); */
?> 
