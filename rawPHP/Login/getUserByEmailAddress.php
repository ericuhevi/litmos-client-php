<?php
ini_set('include_path', '/usr/local/share/pear/');
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.litmos.com/v1.svc/users?source=test&search=ericuhe@gmail.com&format=xml');
$request->setMethod(HTTP_Request2::METHOD_GET);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->setHeader(array(
    'apiKey' => '34566681-e1ff-4fc0-b344-63488336385d'
));
try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
        $xml = $response->getBody();
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        var_dump($array);
    }
    else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
    }
}
catch(Error $ge) {
    echo 'Error: ' . $eg->getMessage();
}
catch(HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>