<?php

use Iugu\Iugu;

class InvoiceTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $this->api_key = getenv('IUGU_API_KEY');
        $this->account_id = getenv('IUGU_ACCOUNT_ID');
        $this->iugu = new Iugu($this->api_key);
    }

    /**
     * @group invoice
     */
    public function testInvoiceCanBeCreated()
    {
        $this->markTestIncomplete('The invoice tests are incomplete.');

        $invoice = $this->iugu->invoice()->create([
            'email'    => 'teste@teste.com',
            'due_date' => '30/11/2016',
            'items'    => [
                [
                    'description' => 'Item Um',
                    'quantity'    => '1',
                    'price_cents' => '1000',
                ],
            ],
        ]);

        $this->assertEquals($invoice->due_date, '2016-11-30');
        $this->assertEquals($invoice->currency, 'BRL');
        $this->assertEquals($invoice->email, 'teste@teste.com');
    }
}
