<?php
function init_curl() {
    $curl = curl_init();
    curl_setopt_array($curl, array( 
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type:  application/xml',
        'config_authType:  API_key',
        'config_packageName:  Litmos',
        'config_actualUrl:  https://api.litmos.com/v1.svc',
        'config_urlPattern:  https://api.litmos.com/v1.svc',
        'config_apiName:  LitmosAPIdetails',
        'APIKey:  34566681-e1ff-4fc0-b344-63488336385d'
    )));
    return $curl;
}
?>