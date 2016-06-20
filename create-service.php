<?php
require_once 'vendor/autoload.php';
require_once './config.php';

// Authenticate with Twilio
$client = new Twilio\Rest\Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);

// Create a user notification service instance
$serviceData = array(
        "friendlyName" => "My First Notifications App",
);

if ($TWILIO_APN_CREDENTIAL_SID != "") {
  $serviceData["apnCredentialSid"] = $TWILIO_APN_CREDENTIAL_SID;
  print "Adding APN Credentials to service";
} else {
  print "No APN Credentials configured - add in config.php, if available.";
}

if ($TWILIO_GCM_CREDENTIAL_SID != "") {
  $serviceData["gcmCredentialSid"] = $TWILIO_GCM_CREDENTIAL_SID;
  print "Adding GCM Credentials to service";
} else {
  print "No GCM Credentials configured - add in config.php, if available.";
}

$service = $client->notifications->v1->services->create($serviceData);

print_r($service); 