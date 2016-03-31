<?php

namespace Iugu\Util;

use GuzzleHttp\Client;

class Request
{
    protected $base_url = 'https://api.iugu.com/v1/';

    public function postRequest($url, $data, $apiKey)
    {
        $client = new Client(['base_uri' => $this->base_url]);
        $options = [
            'auth' => [$apiKey, ''],
            'form_params' => $data,
        ];

        $request = $client->post($url, $options);
        return json_decode($request->getBody());

    }
}
