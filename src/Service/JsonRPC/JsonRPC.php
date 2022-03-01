<?php

namespace App\Service\JsonRPC;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class JsonRPC
{
    private Client $client;
    private string $activityUrl;

    public function __construct(string $activityUrl)
    {
        $this->client      = new Client();
        $this->activityUrl = $activityUrl;
    }

    public function command(string $commandName, array $args) : void
    {
        $body = [
            'method' => $commandName,
            'params' => $args ];
        $this->_request($body);
    }

    public function query(string $queryName, array $args) : array
    {
        $body = [
            'method' => $queryName,
            'params' => $args,
            'id'     => 1 ];
        return $this->_request($body);
    }

    /**
     * @throws GuzzleException
     * @throws \JsonException
     */
    private function _request($body) : array
    {
        $body['json-rpc'] = '2.0';
        $response         = $this->client->post($this->activityUrl, [ 'body' => json_encode($body, JSON_THROW_ON_ERROR) ]);
        $body             = $response->getBody()->getContents();
        $decodedResponse  = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        return $decodedResponse['result'] ?? [];
    }
}
