<?php

use Iugu\Iugu;

class MarketplaceTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $this->api_key = getenv("IUGU_API_KEY");
        $this->account_id = getenv("IUGU_ACCOUNT_ID");
        $this->iugu = new Iugu($this->api_key);
    }

    public function test_sub_account_can_be_created()
    {
        $sub_account = $this->iugu->marketPlace()->subAccount()->create([
            'name' => 'Subconta',
            'commission_percent' => '10',
        ]);

        $this->assertEquals($sub_account->name, 'Subconta');
    }
}
