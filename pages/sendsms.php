<?php
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twilio-php-master/src/Twilio/autoload.php';
    use Twilio\Rest\Client;
    $mobile = $_POST['mobile'];
    $msg = $_POST['msg'];
    $sid = 'ACcaffbea195bd0eec21d00bc7fe95ee90';
    $token = '27e40a0be0d2ed4034462bbef7ac0a82';
    $client = new Client($sid, $token);

    $client->message->create(
        $mobile, array(
            'from' => '+12057079124',
            'body' => $msg
        )
    );