<?php

class ClientTest extends PHPUnit_Framework_TestCase
{
    public function test_client_can_be_created()
    {
        $api_key = getenv("IUGU_API_KEY");
        $account_id = getenv("IUGU_ACCOUNT_ID");

        $iugu = new Iugu($api_key);

        $email = 'email@email.com';
        $name = 'Joao';

        $client = $iugu->customer()->create([
            'email' => $email,
            'name' => $name,
            'notes' => 'nenhuma',
        ]);

        $this->assertNotNull($client);
        $this->assertEquals($client->email, $email);
        $this->assertEquals($client->name, $name);
    }
}
