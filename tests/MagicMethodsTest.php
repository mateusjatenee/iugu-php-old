<?php

use Mateusjatenee\Iugu\Charge;
use Mateusjatenee\Iugu\Customer;
use Mateusjatenee\Iugu\Iugu;

class MagicMethodsTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->iugu = new Iugu('foo');
    }

    /** @test */
    public function charge_should_return_an_instance_of_Charge()
    {
        $this->assertInstanceOf(Charge::class, $this->iugu->charge);
    }

    /** @test */
    public function customer_should_return_an_instance_of_Customer()
    {
        $this->assertInstanceOf(Customer::class, $this->iugu->customer);
    }

    /** @test */
    public function client_should_return_an_exception()
    {
        $this->setExpectedException(\Exception::class, 'Method client does not exist');
        $this->assertNotInstanceOf(Customer::class, $this->iugu->client);
    }

}
