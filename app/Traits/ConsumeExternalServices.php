<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeExternalServices
{
    /**
     * Send request to any services
     * @param  string $method     [description]
     * @param  string $requestUrl [description]
     * @param  array  $formParams [description]
     * @param  array  $headers    [description]
     * @return response           [description]
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        if (isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers' => $headers
        ]);

        return $response->getBody()->getContents();
    }
}