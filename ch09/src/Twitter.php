<?php

namespace TwitterApp;

use Exception;
use GuzzleHttp\Client;

class Twitter 
{
    const TWITTER_API_BASE_URI = 'https://api.twitter.com';

    private $key;
    private $secret;
    private $accessToken;
    private $client;

    public function __construct(String $key, String $secret) 
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->client = new Client(
            ['base_uri' => self::TWITTER_API_BASE_URI]
        );

        $this->requestAccessToken();
        var_dump($this->accessToken);
    }

    private function requestAccessToken() {
        $encodedString = base64_encode(
            $this->key . ':' . $this->secret
        );
        $headers = [
            'Authorization' => 'Basic ' . $encodedString,
            'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
        ];
        $options = [
            'headers' => $headers,
            'body' => 'grant_type=client_credentials'
        ];
        $response = $this->client->post(self::TWITTER_API_BASE_URI, $options);
        $body = json_decode($response->getBody(), true);
        $this->accessToken = $body['access_token'];
    }
    
    public function fetchTwits(string $name, int $count): array
    {
        return [];
    }
}