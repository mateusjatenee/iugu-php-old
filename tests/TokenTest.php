<?php

class TokenTest extends PHPUnit_Framework_TestCase
{
    public function test_token_can_be_created()
    {
        $api_key = getenv("IUGU_API_KEY");
        $account_id = getenv("IUGU_ACCOUNT_ID");

        $iugu = new Iugu($api_key);
        $token = $iugu->token()->create([
            'account_id' => $account_id,
            'method' => 'credit_card',
            'data' => [
                'number' => '4111111111111111',
                'verification_value' => '123',
                'first_name' => 'Joao',
                'last_name' => 'Silva',
                'month' => '12',
                'year' => '2013',
            ],
        ]);

        $this->assertEquals($token->method, 'credit_card');
        $this->assertNotNull($token->id);
    }
}