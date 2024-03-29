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
                    'redirect_uri'  => 'http://success-mission.elodie-meunier.fr/google',
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
                $users = $this->users->get($response->email);

                if ($users['email'] == (string)$response->email)
                {
                    $_SESSION['id'] = $users['id_user'];
                    $_SESSION['first_name'] = $users['first_name'];
                    $_SESSION['last_name'] = $users['last_name'];
                    $_SESSION['email'] = $users['email'];
                    if ($this->session->is_connected())
                    {
                        $this->redirecting('dashboard');
                    }
                }
                else
                {
                    $newUser = $this->users->newUser(
                        $response->email,
                        null,
                        $response->given_name,
                        $response->family_name,
                        'true',
                        $response->picture
                    );
                    $getUsers = $this->users->get($response->email);

                    $_SESSION['id'] = $getUsers['id_user'];
                    $_SESSION['first_name'] = $response->given_name;
                    $_SESSION['last_name'] = $response->family_name;
                    $_SESSION['email'] = $response->email;

                    if ($this->session->is_connected())
                    {
                        $this->redirecting('dashboard');
                    }
                }
            }
            require VIEW_FRONT . 'google.php';
        } 
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            var_dump($e->getMessage());
        }

    }
}