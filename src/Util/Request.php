<?php

namespace Iugu\Util;

use GuzzleHttp\Client;

class Request
{
    public function __construct()
    {
        $this->guzzle = new Client(['base_uri' => 'https://api.iugu.com/v1/']);
    }

    public function postRequest($url, $data)
    {
        $req = $this->guzzle($url, $data);
        return json_decode($req, true);
    }
}
