<?php

use Iugu\Iugu;

class ClientPaymentMethodsTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $this->api_key = getenv("IUGU_API_KEY");
        $this->account_id = getenv("IUGU_ACCOUNT_ID");
        $this->iugu = new Iugu($this->api_key);
    }

    public function test_payment_method_can_be_created()
    {
        $email = 'email@email.com';
        $name = 'Joao';

        $client = $this->iugu->customer()->create([
            'email' => $email,
            'name' => $name,
            'notes' => 'nenhuma',
        ]);

        $payment_method = $this->iugu->customer()->payment()->create($client->id, [
            "description" => "Primeiro Cartão",
            "item_type" => "credit_card",
            "data" => [
                "number" => "4111111111111111",
                "verification_value" => "123",
                "first_name" => "Nome",
                "last_name" => "Sobrenome",
                "month" => "12",
                "year" => "2014",
            ],
        ]);
    }
}
