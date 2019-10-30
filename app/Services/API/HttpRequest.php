<?php

namespace App\Services\API;



use GuzzleHttp\Exception\GuzzleException;
use http\Message\Body;



class HttpRequest
{

    public static function HttpRequestAPI($base_uri, $uri, $method, array $params = [])
    {
      $var= json_encode($params);

      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://vendedor.develapi.gruponobre.com/comissao",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS =>$var,
          CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
        }

    }
}
