<?php

use Iugu\Iugu;

class MarketplaceTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $this->api_key = getenv('IUGU_API_KEY');
        $this->account_id = getenv('IUGU_ACCOUNT_ID');
        $this->iugu = new Iugu($this->api_key);
    }

    /**
     * @group marketplace
     */
    public function testSubAccountCanBeCreated()
    {
        $this->markTestIncomplete(
            'Not all accounts have marketplace features implemented, so there is no reason to test this now.'
        );
        $sub_account = $this->iugu->marketPlace()->subAccount()->create([
            'name'               => 'Subconta',
            'commission_percent' => '10',
        ]);

        $this->assertEquals($sub_account->name, 'Subconta');
    }
}
