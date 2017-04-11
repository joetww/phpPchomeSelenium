<?php

namespace phpUnitPCHOME\Test;

class StupidTest extends \PHPUnit_Framework_TestCase
{
    public function testTrueIsTrue()
    {
        $foo = true;
        $this->assertTrue($foo);
    }

    public function testFalseIsFalse()
    {
        $foo = false;
        $this->assertTrue($foo);
    }
}
?>
