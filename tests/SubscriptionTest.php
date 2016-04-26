<?php

use Mateusjatenee\Iugu\Iugu;

class SubscriptionTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->api_key = getenv('IUGU_API_KEY');
        $this->account_id = getenv('IUGU_ACCOUNT_ID');
        $this->iugu = new Iugu($this->api_key);
    }

    /**
     * @group subscription
     */
    public function testSubscriptionCanBeCreated()
    {
        $this->markTestIncomplete('Buggy code');

        $email = 'email@email.com';
        $name = 'Joao';

        $client = $this->iugu->customer()->create([
            'email' => $email,
            'name' => $name,
            'notes' => 'nenhuma',
        ]);

        $data = [
            'customer_id' => $client->id,
            'subitems' => [
                [
                    'description' => 'Item um',
                    'quantity' => '1',
                    'price_cents' => '1000',
                ],
            ],
        ];

        $subscription = $this->iugu->subscription()->create($data);

        $this->assertEquals($subscription->customer_name, $client->name);
        $this->assertEquals($subscription->customer_id, $client->id);
    }
}
