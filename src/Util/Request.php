<?php

namespace Iugu\Util;

use GuzzleHttp\Client;

class Request
{
    /**
     * @var string
     */
    protected $base_url = 'https://api.iugu.com/v1/';

    /**
     * @param $url
     * @param $apiKey
     * @param $options
     * @return stdObject
     */
    public function getRequest($url, $apiKey, $options = null)
    {
        $client = new Client(['base_uri' => $this->base_url]);
        $options = [
            'auth' => [$apiKey, ''],
            $options,
        ];

        $request = $client->get($url, $options);
        return json_decode($request->getBody());
    }

    /**
     * @param $url
     * @param $data
     * @param $apiKey
     * @return StdObject
     */
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

    /**
     * @param $url
     * @param $apiKey
     * @return stdObject
     */
    public function deleteRequest($url, $apiKey)
    {
        $client = new Client(['base_uri' => $this->base_url]);
        $options = [
            'auth' => [$apiKey, ''],
        ];

        $request = $client->delete($url, $options);
        return json_encode($request->getBody());
    }
}
