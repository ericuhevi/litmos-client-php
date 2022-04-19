<?php
require './getUserByEmailCurl.php';
function addUserToCoursesByCurl($email, $courseIdArray)
{
    $user = getUserByEmail($email);
    $userId = $user['User']['Id'];
    $url = 'https://api.litmos.com/v1.svc/users/' . $userId . '/courses';
    $params = array(
		'source' => 'vi_app',
		'format' => 'xml'
	);	    
    $curl = init_curl();
	$url = $url . '?' . http_build_query($params);	
    $courseXML = getCourseXML($courseIdArray);
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $courseXML
      ));

    $response = curl_exec($curl);    
    curl_close($curl);
    
}
function getCourseXML($courseArray)
{
    $courseXML = '<Courses>
';
    foreach ($courseArray as $id) {
        $courseXML = $courseXML . '    <Course>
        <Id>' . $id . '</Id>
    </Course>
';
    }
    $courseXML = $courseXML . '</Courses>';
    return $courseXML;
}
addUserToCoursesByCurl('LeonardSomtil@sap.com', array('kD2oDXqCoaE1', 'SdF8KLUZuts1'));