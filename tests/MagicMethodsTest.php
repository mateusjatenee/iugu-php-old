<?php

use Mateusjatenee\Iugu\Charge;
use Mateusjatenee\Iugu\Iugu;

class MagicMethodsTest extends PHPUnit_Framework_TestCase
{

    /** @test */
    public function charge_should_return_an_instance_of_Charge()
    {
        $iugu = new Iugu('foo');
        $this->assertInstanceOf(Charge::class, $iugu->charge);
    }

}
