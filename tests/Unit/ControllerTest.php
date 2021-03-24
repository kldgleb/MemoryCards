<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Http\Controllers\Controller;

class ControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_toCamelCase()
    {
        $controller = new Controller;
        $result1 = $controller->toCamelCase('Hello World!');
        $this->assertSame('HelloWorld!',$result1);
        $result2 = $controller->toCamelCase('big string value');
        $this->assertSame('BigStringValue',$result2);
    }
}
