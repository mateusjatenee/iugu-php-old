<?php

use Iugu\Iugu;

class ClientPaymentMethodsTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $this->api_key = getenv('IUGU_API_KEY');
        $this->account_id = getenv('IUGU_ACCOUNT_ID');
        $this->iugu = new Iugu($this->api_key);
    }

    /**
     * @group client_payment_method
     */
    public function testPaymentMethodCanBeCreated()
    {
        $client = $this->createClient();

        $payment_method = $this->createPaymentMethod($client);

        $this->assertEquals($payment_method->description, 'Primeiro Cartão');
        $this->assertEquals($payment_method->item_type, 'credit_card');
        $this->assertObjectHasAttribute('id', $payment_method);
        $this->assertObjectHasAttribute('data', $payment_method);
    }

    /**
     * @group client_payment_method
     */
    public function testCustomerPaymentMethodCanBeFetched()
    {
        $client = $this->createClient();

        $payment_method = $this->createPaymentMethod($client);

        $fetched_payment_method = $this->iugu->customer()->payment()->fetch($client->id, $payment_method->id);

        $this->assertEquals($payment_method->description, $fetched_payment_method->description);
    }

    /**
     * @group client_payment_method
     */
    public function testCustomerPaymentMethodCanBeRemoved()
    {
        $client = $this->createClient();

        $payment_method = $this->createPaymentMethod($client);

        $deleted_payment_method = $this->iugu->customer()->payment()->delete($client->id, $payment_method->id);

        $this->assertEquals($deleted_payment_method, '{}');
    }

    protected function createClient()
    {
        $email = 'email@email.com';
        $name = 'Joao';

        $client = $this->iugu->customer()->create([
            'email' => $email,
            'name' => $name,
            'notes' => 'nenhuma',
        ]);

        return $client;
    }

    protected function createPaymentMethod($client)
    {
        $payment_method = $this->iugu->customer()->payment()->create($client->id, [
            'description' => 'Primeiro Cartão',
            'item_type' => 'credit_card',
            'data' => [
                'number' => '4111111111111111',
                'verification_value' => '123',
                'first_name' => 'Nome',
                'last_name' => 'Sobrenome',
                'month' => '12',
                'year' => '2014',
            ],
        ]);

        return $payment_method;
    }
}
