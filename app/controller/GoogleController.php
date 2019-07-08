<?php

namespace App\Controller;
use GuzzleHttp\Client;


class GoogleController extends Controller {

    public function index() 
    {
        try 
        {
            $client = new Client([
                'timeout'  => 2.0
            ]);
            $response = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
            $discoveryJSON = json_decode((string)$response->getBody());
            $tokenEndpoint = $discoveryJSON->token_endpoint;
            $userinfoEndpoint = $discoveryJSON->userinfo_endpoint;
            $response = $client->request('POST', $tokenEndpoint, [
                'form_params' => [
                    'code'          => $_GET['code'],
                    'client_id'     => GOOGLE_ID,
                    'client_secret' => GOOGLE_SECRET,
                    'redirect_uri'  => 'http://localhost:8888/google',
                    'grant_type'    => 'authorization_code'
                ]
            ]);
            $accessToken = json_decode((string)$response->getBody())->access_token;
            $response = $client->request('GET', $userinfoEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken
                ]
            ]);
            $response = json_decode($response->getBody());
            if ($response->email_verified === true)
            {
                $_SESSION['email'] = $response->email;
            }
            echo '<pre>';
            print_r($_SESSION);
            require VIEW_FRONT . 'google.php';
        } 
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            var_dump($e->getMessage());
        }

    }
}