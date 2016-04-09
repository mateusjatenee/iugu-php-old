<?php

namespace Iugu;

use Iugu\Transfer;

class Iugu
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Retorna uma instância da classe Token.
     *
     * @return Iugu\Token
     */
    public function token()
    {
        return new Token($this->apiKey);
    }

    /**
     * Retorna uma instância da classe Charge.
     *
     * @return Iugu\Charge
     */
    public function charge()
    {
        return new Charge($this->apiKey);
    }

    /**
     * Retorna uma instância da classe Customer.
     *
     * @return Iugu\Customer
     */
    public function customer()
    {
        return new Customer($this->apiKey);
    }

    /**
     * Retorna uma instância da classe MarketPlace.
     *
     * @return Iugu\MarketPlace
     */
    public function marketPlace()
    {
        return new MarketPlace($this->apiKey);
    }

    public function transfer()
    {
        return new Transfer($this->apiKey);
    }
}
