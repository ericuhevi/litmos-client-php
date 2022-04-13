<?php
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.litmos.com/v1.svc/tokens?source=test&format=json');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->setHeader(array(
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Accept' => 'application/vnd.api+json',
    'apiKey' => '34566681-e1ff-4fc0-b344-63488336385d'
));
$request->setBody('{\n    "TOKENS": [\n        {\n            "TOKEN": { \n                "TOKENCODE": "TestTokenPost",\n                "TOKENTYPE": 1,\n                "TOKENTYPEID": "2hbispVqQgU1",\n                "ACTIVE": true,\n                "MAXIMUMACTIVATIONS": 10,\n                "TOKENEXPIRATION": "/Date(1649591396980-0500)/"\n            }\n        }\n    ]\n}');
try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
        echo $response->getBody();
    }
    else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
    }
}
catch(HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>