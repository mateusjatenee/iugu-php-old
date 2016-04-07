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
        $email = 'email@email.com';
        $name = 'Joao';

        $client = $this->iugu->customer()->create([
            'email' => $email,
            'name'  => $name,
            'notes' => 'nenhuma',
        ]);

        $this->assertNotNull($client);
        $this->assertEquals($client->email, $email);
        $this->assertEquals($client->name, $name);

        $delete = $this->iugu->customer()->delete($client->id);
    }

    /**
     * @group client
     */
    public function testClientCanBeFetched()
    {
        $client = $this->iugu->customer()->create([
            'email' => 'john@doe.com',
            'name'  => 'John Doe',
            'notes' => 'None',
        ]);

        $foundCustomer = $this->iugu->customer()->fetch($client->id);

        $this->assertEquals($foundCustomer->email, $client->email);
        $this->assertEquals($foundCustomer->name, $client->name);
    }

    /**
     * @group client
     */
    public function testClientCanBeDeleted()
    {
        $client = $this->iugu->customer()->create([
            'email' => 'john@doe.com',
            'name'  => 'John Doe',
            'notes' => 'None',
        ]);

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
}
