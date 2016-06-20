<?php
require_once 'vendor/autoload.php';
require_once './config.php';

// Authenticate with Twilio
$client = new Twilio\Rest\Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);

// Send a notification 
$service = $client->notifications->v1->services($TWILIO_NOTIFICATION_SERVICE_SID);

$notification = $service->notifications->create(
    array(
        identity => $argv[1], 
        body => "Hello " + $argv[1],
    )
);

print_r($notification);
 