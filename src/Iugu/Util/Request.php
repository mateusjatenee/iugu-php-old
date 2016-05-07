<?php

namespace Mateusjatenee\Iugu\Util;

use GuzzleHttp\Client;
use Mateusjatenee\Iugu\Contracts\RequestInterface;

class Request implements RequestInterface
{
    public function __construct()
    {
        $this->guzzle = new Client(['base_uri' => 'https://api.iugu.com/v1/']);
    }

    /**
     * @param $url
     * @param $apiKey
     * @param $options
     *
     * @return stdClass
     */
    public function get($url, $apiKey, $options = null)
    {
        $options = [
            'auth' => [$apiKey, ''],
            $options,
        ];

        $request = $this->guzzle->get($url, $options);

        return json_decode($request->getBody());
    }

    /**
     * @param $url
     * @param $data
     * @param $apiKey
     *
     * @return stdClass
     */
    public function put($url, $data, $apiKey)
    {
        $options = [
            'auth' => [$apikey, ''],
            'form_params' => $data,
        ];

        $request = $this->guzzle->put($url, $options);

        return json_decode($request->getBody());
    }

    /**
     * @param $url
     * @param $data
     * @param $apiKey
     *
     * @return stdClass
     */
    public function post($url, $data, $apiKey)
    {
        $options = [
            'auth' => [$apiKey, ''],
            'form_params' => $data,
        ];

        $request = $this->guzzle->post($url, $options);

        return json_decode($request->getBody());
    }

    /**
     * @param $url
     * @param $apiKey
     *
     * @return stdClass
     */
    public function delete($url, $apiKey)
    {
        $options = [
            'auth' => [$apiKey, ''],
        ];

        $request = $this->guzzle->delete($url, $options);

        return json_encode($request->getBody());
    }
}
