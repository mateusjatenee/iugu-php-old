<?php

namespace Iugu\Util;

use GuzzleHttp\Client;

class Request
{

    public function postRequest($url, $data)
    {
        $client = new Client(['base_uri' => 'https://api.iugu.com/v1/']);
        $req = $client->request('POST', $url, $data);
        return $req->getBody();
    }
}
