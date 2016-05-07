<?php

namespace Mateusjatenee\Iugu\Contracts;

interface RequestInterface
{
    public function get($url, $apiKey, $options = null);

    public function post($url, $data, $apiKey);

    public function put($url, $data, $apiKey);

    public function delete($url, $apiKey);
}
