<?php

use Mateusjatenee\Iugu\Util\Request;
use \Mockery as M;

class RequestTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->mock = M::mock(Request::class);
    }

    public function tearDown()
    {
        M::close();
    }

    /** @group request */
    public function test_get_makes_a_get_request()
    {
        $this->mock->shouldReceive('get')
            ->with('url', 'apiKey')
            ->once()
            ->andReturn('GET Request successfuly made');

        $this->assertEquals('GET Request successfuly made', $this->mock->get('url', 'apiKey'));
    }
}
