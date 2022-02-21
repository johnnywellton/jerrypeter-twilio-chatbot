<?php

// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

$sid    = "ACa5a295d89d24f1a9693c6fd87ff6e2ff";
$token  = "f21a7e2222c2c9597ccf0343a72c7670";
$twilio = new Client($sid, $token);

$sender = $_POST['From'];
$msg = $_POST['Body'];

$twilio_number = "+14155238886";

$cmd = trim(strtoupper(substr($msg, 0, 5)));

// -----------------------------------------
switch ($cmd) {
    case 'ESS':
        $body = "Hello " . $sender .
            "\n\nTerima kasih sudah menghubungi ESS Service, silakan reply menu ESS berikut: \n" .
            "\nCuti <tgl1> <tgl2> <keterangan>" .
            "\nLembur <tgl1> <keterangan>" .
            "\nBrosur <MMYYYY>" .
            "\n" .
            "\nContoh: \nCuti 15/01/2020 keperluan peribadi" .
            "Brosur 012020";
        $mediaUrl = "http://localhost/twilio-chatbot/files/welcome.png";
        break;
    case 'CUTI':
        $body = "Hello " . $sender .
            "\n\nCuti anda sudah diproses \nTerima kasih\n\nESS BOT SERVICE";
        $mediaUrl = "http://localhost/twilio-chatbot/files/thanks.png";
        break;
    case 'LEMBU':
        $body = "Hello " . $sender .
            "\n\nCuti anda sudah diproses \nTerima kasih\n\nESS BOT SERVICE";
        $mediaUrl = "http://localhost/twilio-chatbot/files/thanks.png";
        break;
    case 'BROSU':
        $body = "Hello " . $sender .
            "\n\nBerikut adalah brosur untuk periode yang diminta \nTerima kasih\n\nESS BOT SERVICE";
        $mediaUrl = "http://localhost/twilio-chatbot/files/thanks.png";
        break;
    default:
        $body = "Hello " . $sender .
            "\n\nTerima kasih sudah menghubungi ESS Service, saat ini permintaan anda belum tersedia, silakan hubungi " .
            "\n\n atau \n\n" .
            "reply dengan pesan 'ESS' tanpa tanda petik untuk melihat menu ESS \n\nESS BOT SERVICE" .
            "---------------------------------------\n" .
            "{Sender: " . $sender . "}\n" .
            "{Message: " . $msg . "}";
        $mediaUrl = "http://localhost/twilio-chatbot/files/error.png";
        break;
}

$message = $twilio->messages
    ->create(
        $to, // to 
        array(
            "from" => "whatsapp:$twilio_number",
            "body" => $body,
            "mediaUrl" => [$mediaUrl]
        )
    );

// Brosur
if ($cmd == 'BROSUR') {
    $mediaUrl = "http://localhost/twilio-chatbot/files/brosur.pdf";

    $message = $twilio->messages
        ->create(
            $to, // to 
            array(
                "from" => "whatsapp:$twilio_number",
                "body" => $body,
                "mediaUrl" => [$mediaUrl]
            )
        );
}
