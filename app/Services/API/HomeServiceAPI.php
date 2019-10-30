<?php


namespace App\Services\API;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

use GuzzleHttp\Client;
use  GuzzleHttp \ Psr7 \ Request ;

class EstatisticasServiceAPI
{
    public static function get($cpffunc, $banco, $datainit, $datafim)
    {

        $var = array(
            "cpffunc" => $cpffunc,
            "banco" => $banco,
            "datainit" => $datainit,
            "datafim" => $datafim
        );
        
        $tst = json_encode($var);


        $client = new Client(['base_uri' => 'http://vendedor.develapi.gruponobre.com']);
        $response = $client->request('GET', 'home?req='.$tst.'');
        return json_decode($response->getBody()->getContents());
    }
}
