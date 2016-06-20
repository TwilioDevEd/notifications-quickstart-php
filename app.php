<?php
require_once 'vendor/autoload.php';


Flight::route('GET /', function(){
    require './config.php';
    $configData = array(
        'TWILIO_ACCOUNT_SID' => $TWILIO_ACCOUNT_SID,
        'TWILIO_AUTH_TOKEN' => $TWILIO_AUTH_TOKEN,
        'TWILIO_APN_CREDENTIAL_SID' => $TWILIO_APN_CREDENTIAL_SID,
        'TWILIO_GCM_CREDENTIAL_SID' => $TWILIO_GCM_CREDENTIAL_SID,
        'TWILIO_NOTIFICATION_SERVICE_SID' => $TWILIO_NOTIFICATION_SERVICE_SID,
    );
    Flight::render('index.php', $configData);
});

Flight::route('POST /register', function(){
    require './config.php';
    
    // Authenticate with Twilio
    $client = new Twilio\Rest\Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
    
    // Get a reference to the user notification service instance
    $service = $client->notifications->v1->services($TWILIO_NOTIFICATION_SERVICE_SID);
    $body = Flight::request()->getBody();
    $json = json_decode($body, true);
    
    // Create a binding
    try {
        $binding = $service->bindings->create(
            $json['endpoint'],
            $json['identity'],
            $json['bindingType'],
            $json['address']
        );
        
        $response = array(
            message => 'Binding created'
        );
        Flight::json($response);
    } catch (Exception $e) {
        $response = array(
            message => 'Error creating binding: ' . $e->getMessage(),
            error => $e->getMessage()
        );
        Flight::json($response, 500);
    }
});

Flight::set('flight.log_errors', true);

Flight::start();
