<?php

namespace Iugu\Util;

use GuzzleHttp\Client;

class Request
{

    public function postRequest($url, $data, $apiKey)
    {
        $client = new Client(['base_uri' => 'https://api.iugu.com/v1/']);
        $req = $client->request('POST', $url, [
            'auth' => [$apiKey, ''],
            $data,
        ]);
        return json_decode($req->getBody());
    }
}
