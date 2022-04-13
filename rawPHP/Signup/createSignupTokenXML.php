<?php
ini_set('include_path', '/usr/local/share/pear/');
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.litmos.com/v1.svc/tokens?source=test&format=xml');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->setHeader(array(
    'Content-Type' => 'application/xml',
    'Accept' => 'application/xml',
    'apiKey' => '34566681-e1ff-4fc0-b344-63488336385d'
));
$request->setBody('<TOKENS>\n    <TOKEN>\n        <TOKENCODE>TestTokenPost</TOKENCODE>\n        <TOKENTYPE>1</TOKENTYPE>\n        <TOKENTYPEID>2hbispVqQgU1</TOKENTYPEID>\n        <ACTIVE>true</ACTIVE>\n        <MAXIMUMACTIVATIONS>10</MAXIMUMACTIVATIONS>\n        <TOKENEXPIRATION>2022-07-01 00:00:00</TOKENEXPIRATION>\n    <TOKEN>\n</TOKENS>');
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