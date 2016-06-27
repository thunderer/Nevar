<?php
namespace Thunder\Nevar\Tests;

use Thunder\Nevar\Tests\Fake\FakeClass;
use Thunder\Nevar\Nevar;

/**
 * @author Tomasz Kowalczyk <tomasz@kowalczyk.cc>
 */
final class NevarTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideVariables
     */
    public function testVarInfo($variable, $expected)
    {
        $this->assertSame($expected, Nevar::describe($variable));
    }

    public function provideVariables()
    {
        return [
            [[], 'empty array'],
            [[12], 'indexed array'],
            [['key' => 'value'], 'associative array'],
            [[FakeClass::class, 'method'], 'callable array'],
            [[new FakeClass(), 'method'], 'callable array'],

            [-1.0, 'negative float'],
            [0.0, 'zero float'],
            [-0.0, 'zero float'],
            [1.0, 'positive float'],
            [INF, 'infinite float'],
            [NAN, 'invalid float'],

            [-1, 'negative integer'],
            [0, 'zero integer'],
            [1, 'positive integer'],

            [new \stdClass(), 'object of class stdClass'],
            [new FakeClass(), 'object of class Thunder\Nevar\Tests\Fake\FakeClass'],
            [unserialize('O:1:"A":0:{}'), 'object of class __PHP_Incomplete_Class'],
            [function () {}, 'object of class Closure'],

            [STDIN, 'resource of type stream'],
            [STDOUT, 'resource of type stream'],

            ['', 'empty string'],
            ['string', 'string'],
            ['strlen', 'callable string'],
            ['Thunder\\Nevar\\Tests\\Fake\\FakeClass::method', 'callable string'],
            ['10', 'numeric string'],
            ['1.0', 'numeric string'],

            [true, 'boolean true'],
            [false, 'boolean false'],
        ];
    }
}
