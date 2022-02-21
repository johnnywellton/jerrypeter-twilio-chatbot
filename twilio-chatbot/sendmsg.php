<?php

// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

$sid    = "ACa5a295d89d24f1a9693c6fd87ff6e2ff";
$token  = "f21a7e2222c2c9597ccf0343a72c7670";
$twilio = new Client($sid, $token);

$message = $twilio->messages
    ->create(
        "whatsapp:+60145510792", // to 
        array(
            "from" => "whatsapp:+14155238886",
            "body" => "Hello world dari API Twilio."
        )
    );

print($message->sid);
