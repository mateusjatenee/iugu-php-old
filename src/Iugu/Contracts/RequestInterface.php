<?php

namespace Mateusjatenee\Iugu\Contracts;

interface RequestInterface
{
    public function getRequest($url, $apiKey, $options = null);

    public function postRequest($url, $data, $apiKey);

    public function putRequest($url, $data, $apiKey);

    public function deleteRequest($url, $apiKey);
}
