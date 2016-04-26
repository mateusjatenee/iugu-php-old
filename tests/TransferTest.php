<?php

use Mateusjatenee\Iugu\Iugu;

class TransferTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $this->api_key = getenv('IUGU_API_KEY');
        $this->account_id = getenv('IUGU_ACCOUNT_ID');
        $this->iugu = new Iugu($this->api_key);
    }

    /**
     * @group transfer
     */
    public function testTransferCanBeDone()
    {
        $this->markTestIncomplete(
            'Requires a live environment.'
        );

        $email = 'email@email.com';
        $name = 'Joao';

        $client = $this->iugu->customer()->create([
            'email' => $email,
            'name'  => $name,
            'notes' => 'None',
        ]);

        $transferance = $this->iugu->transfer()->create([
            'receiver_id'  => $client->id,
            'amount_cents' => 100,
        ]);

        $this->assertEquals($transferance->amount_cents, 100);
        $this->assertEquals($transferance->receiver->id, $client->id);
    }
}
