<?php

use Iugu\Iugu;

class ChargeTest extends PHPUnit_Framework_TestCase
{
    public function test_someone_can_be_charged()
    {
        $api_key = getenv('IUGU_API_KEY');
        $account_id = getenv('IUGU_ACCOUNT_ID');

        $iugu = new Iugu($api_key);

        $token = $iugu->token()->create([
            'account_id' => $account_id,
            'method'     => 'credit_card',
            'test'       => true,
            'data'       => [
                'number'             => '4111111111111111',
                'verification_value' => '123',
                'first_name'         => 'Joao',
                'last_name'          => 'Silva',
                'month'              => '12',
                'year'               => '2016',
            ],
        ]);

        $charge = $iugu->charge()->create([
            'token' => $token->id,
            'email' => 'teste@superteste.abc',
            'items' => [
                'description' => 'Item Teste',
                'quantity'    => '1',
                'price_cents' => '100',
            ],
        ]);

        $this->assertNotNull($charge);
        $this->assertEquals($charge->success, true);
        $this->assertEquals($charge->message, 'Autorizado');
        $this->assertNotNull($charge->invoice_id);
    }
}
