<?php
require './getUserByEmailCurl.php';
function getUserLoginKey($email) {
    global $url, $curl;  
    $user = getUserByEmail($email);
    $userId = $user['User']['Id'];
    $params = array(
		'source' => 'vi_app',
		'format' => 'xml'
	);	
	$localUrl = $url . '/' . $userId . '?'.http_build_query($params);
    curl_setopt($curl, CURLOPT_URL, $localUrl);
    $xml = curl_exec($curl);
    if($xml) {        
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        $xmlArray = json_decode($json,TRUE);
        curl_close($curl);    
        echo $xmlArray['LoginKey'];
    }
}
getUserLoginKey('LeonardSomtil@sap.com');
