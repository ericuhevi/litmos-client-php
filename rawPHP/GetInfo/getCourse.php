<?php
ini_set('include_path', '/usr/local/share/pear/');
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.litmos.com/v1.svc/courses/2hbispVqQgU1?source=test&format=json');
$request->setMethod(HTTP_Request2::METHOD_GET);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->setHeader(array(
    "Content-Type" => "application/json",
    "config_authType" => "API_key",
    "config_packageName" => "Litmos",
    "config_actualUrl" => "https://api.litmos.com/v1.svc",
    "config_urlPattern" => "https://api.litmos.com/v1.svc",
    "config_apiName" => "LitmosAPIdetails",
    "APIKey" => "34566681-e1ff-4fc0-b344-63488336385d"
));
try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
        echo $response->getBody();
    }
    else {
        echo 'Unexpected HTTP status => ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
    }
}
catch(HTTP_Request2_Exception $e) {
    echo 'Error => ' . $e->getMessage();
}
?>