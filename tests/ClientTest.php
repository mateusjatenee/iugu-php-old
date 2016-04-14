<?php

use Iugu\Iugu;

class ClientTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $this->api_key = getenv('IUGU_API_KEY');
        $this->account_id = getenv('IUGU_ACCOUNT_ID');
        $this->iugu = new Iugu($this->api_key);
    }

    /**
     * @group client
     */
    public function testClientCanBeCreated()
    {
        $client = $this->createClient();

        $this->assertNotNull($client);
        $this->assertEquals($client->email, 'email@email.com');
        $this->assertEquals($client->name, 'Joao');

        $delete = $this->iugu->customer()->delete($client->id);
    }

    /**
     * @group client
     */
    public function testClientCanBeFetched()
    {
        $client = $this->createClient();

        $foundCustomer = $this->iugu->customer()->fetch($client->id);

        $this->assertEquals($foundCustomer->email, $client->email);
        $this->assertEquals($foundCustomer->name, $client->name);
    }

    /**
     * @group client
     */
    public function testClientCanBeDeleted()
    {
        $client = $this->createClient();

        $deletedClient = $this->iugu->customer()->delete($client->id);

        $this->assertEquals('{}', $deletedClient);
    }

    /**
     * @group client
     */
    public function testClientsCanBeListed()
    {
        $clients = $this->iugu->customer()->all();

        $this->assertNotNull($clients);
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
}
