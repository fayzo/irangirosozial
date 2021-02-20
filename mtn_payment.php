<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://sandbox.momodeveloper.mtn.com/v1_0/apiuser');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Authorization' => '',
    'X-Callback-Url' => '',
    'X-Reference-Id' => '',
    'X-Target-Environment' => '',
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => '{subscription key}',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("{body}");

try {
    $response = $request->send();
    if (200 == $response->getStatus()) {
        echo $response->getBody();
    } else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
             $response->getReasonPhrase();
    }
} catch (HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

// try
// {
//     $response = $request->send();
//     echo $response->getBody();
// }
// catch (HttpException $ex)
// {
//     echo $ex;
// }

?>