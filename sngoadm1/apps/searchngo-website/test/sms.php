<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://cloudsms.jegotrip.com:1820/uips',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 10,  // Timeout for the request
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
      "uip_head": {
        "METHOD": "SMS_SEND_REQUEST",
        "SERIAL": 1,
        "TIME": "2024-09-24 21:54:00",
        "CHANNEL": "AID_HTTPT1713252171JSNP0",
        "AUTH_KEY": "UUBEWQzdLd6M9sqRPyq0/tHFwMs7o07g1eH8Ubd4DrRPEtOtcXz7vKClVukIIRocNpDYmIApIpVg7LiBg2vaoQ=="
      },
      "uip_body": {
        "SMS_CONTENT": "Hello! Your verification code is 12345.",
        "DESTINATION_ADDR": [
          "971547626241"
        ],
        "ORIGINAL_ADDR": "WL-SMS"
      },
      "uip_version": 2
    }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);
if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    echo $response;  // Output the response
}

curl_close($curl);