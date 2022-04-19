<?php
require './initCurl.php';
$curl = init_curl();
$url = 'https://api.litmos.com/v1.svc/users';	 
function getUserByEmail($email) {  
    global $url, $curl;    
	$params = array(
		'source' => 'vi_app',
		'format' => 'xml',
		"search" => $email
	);	
	$localUrl = $url . '?' . http_build_query($params);	
    curl_setopt($curl, CURLOPT_URL, $localUrl);
    $xmlArray = getXMLArray($curl);    
    if(!empty($xmlArray)){
        return $xmlArray;    
    } else {
        return null;
    }
}
function getXMLArray($curl) {    
    $xml = curl_exec($curl);
    if($xml) {        
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        $xmlArray = json_decode($json,TRUE);
        return $xmlArray;
    } else {
        return null;
    }
}
?>
