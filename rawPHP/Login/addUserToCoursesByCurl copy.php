<?php
require './getUserByEmailCurl.php';
function addUserToListingByCurl($email, $listingId)
{

    $user = getUserByEmail($email);
    $xml = new SimpleXMLElement('<Users/>');
    to_xml($xml, $user);
    $url = 'https://api.litmos.com/v1.svc/collectionlistings/' . $listingId . '/users';
    $params = array(
        'source' => 'vi_app',
        'format' => 'xml'
    );
    $curl = init_curl();
    $url = $url . '?' . http_build_query($params);

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $xml->asXML()
    ));

    $response = curl_exec($curl);
    curl_close($curl);
}
function to_xml(SimpleXMLElement $object, array $data)
{
    foreach ($data as $key => $value) {
        if ($key != 'Brand') {
            if (is_array($value)) {
                $new_object = $object->addChild($key);
                to_xml($new_object, $value);
            } else {
                // if the key is an integer, it needs text with it to actually work.
                if ($key != 0 && $key == (int) $key) {
                    $key = "key_$key";
                }

                $object->addChild($key, $value);
            }
        }
    }
}
addUserToListingByCurl('LeonardSomtil@sap.com', '5xLU7VafgRw1');
