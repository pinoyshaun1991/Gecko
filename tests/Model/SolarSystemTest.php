<?php

use gecko\Model\SolarSystemModel;
use PHPUnit\Framework\TestCase;

class SolarSystemTest extends TestCase
{
    /**
     * @dataProvider idProvider
     *
     * @param $id
     * @param $expected
     * @throws ReflectionException
     */
    public function testAdd($id, $expected) : void
    {
        $reflector = new \ReflectionClass(SolarSystemModel::class);
        $instance  = $reflector->newInstance();
        $method    = $reflector->getMethod('add');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $id));
    }

    public function idProvider()
    {
        return [
            [1, 1],
            ['44260076-3856-46ed-88d5-9946c093e6d7', '44260076-3856-46ed-88d5-9946c093e6d7'],
            [1000, 1000],
        ];
    }

    /**
     * @dataProvider calculateProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testCalculate($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(SolarSystemModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('calculate');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function calculateProvider()
    {
        return [
            [1, 2],
            [110, 111]
        ];
    }
}