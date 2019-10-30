<?php


namespace App\Services\API;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

use GuzzleHttp\Client;
use  GuzzleHttp \ Psr7 \ Request ;

class ComissaoServiceAPI
{
    public static function get($cpffunc, $banco, $datainit, $datafim)
       
    {
        $var = array(
                "cpffunc" => $cpffunc,
                "banco" => $banco,
                "datainit" => $datainit,
                "datafim" => $datafim
            );

         $json = json_encode($var);

        try{
            
        $client = new Client(['base_uri' => 'http://vendedor.develapi.gruponobre.com']);
        $response = $client->request('GET', 'comissao?req='.$json.'');
        return json_decode($response->getBody()->getContents());

        }catch(Exception $e){
            
        }
    }
}
