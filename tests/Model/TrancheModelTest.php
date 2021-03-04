<?php

use lendInvest\Model\TrancheModel;
use PHPUnit\Framework\TestCase;

class TrancheModelTest extends TestCase
{
    /**
     * @dataProvider interestRateProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetInterestRate($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(TrancheModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setInterestRate');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function interestRateProvider()
    {
        return [
            [null, 'Interest rate needs to be a numeric value'],
            ['abc', 'Interest rate needs to be a numeric value'],
            ['45-54-123', 'Interest rate needs to be a numeric value'],
            ['01-03-2021abc', 'Interest rate needs to be a numeric value'],
            [1500, 'Interest rate needs to be a numeric value'],
            [2000, 'Interest rate needs to be a numeric value'],
            [30000, 'Interest rate needs to be a numeric value']
        ];
    }

    /**
     * @dataProvider interestRateWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetInterestRateWithoutException($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(TrancheModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setInterestRate');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function interestRateWithoutExceptionProvider()
    {
        return [
            [40.5, 40.5],
            [1000.00, 1000.00]
        ];
    }

    public function testGetInterestRate() : void
    {
        $mockedClass = $this->createMock(TrancheModel::class);
        $mockedClass->method('getInterestRate')
            ->willReturn(1000.00);
        $this->assertEquals(1000.00, $mockedClass->getInterestRate());
    }

    /**
     * @dataProvider amountProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetAmount($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(TrancheModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setAmount');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function amountProvider()
    {
        return [
            [null, 'Amount needs to be a numeric value'],
            ['abc', 'Amount needs to be a numeric value'],
            ['45-54-123', 'Amount needs to be a numeric value'],
            ['01-03-2021abc', 'Amount needs to be a numeric value']
        ];
    }

    /**
     * @dataProvider amountWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function amountWithoutException($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(TrancheModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setAmount');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function amountWithoutExceptionProvider()
    {
        return [
            [400, 400],
            [250, 250]
        ];
    }

    public function testGetAmount() : void
    {
        $mockedClass = $this->createMock(TrancheModel::class);
        $mockedClass->method('getAmount')
            ->willReturn(1000);
        $this->assertEquals(1000, $mockedClass->getAmount());
    }

    /**
     * @dataProvider investProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testInvest($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(TrancheModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('invest');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function investProvider()
    {
        return [
            [null, 'Amount invested needs to be a numeric value'],
            ['abc', 'Amount invested needs to be a numeric value'],
            ['45-54-123', 'Amount invested needs to be a numeric value'],
            ['01-03-2021abc', 'Amount invested needs to be a numeric value'],
            [1500, 'Maximum amount reached for investment'],
            [2000, 'Maximum amount reached for investment'],
            [30000, 'Maximum amount reached for investment']
        ];
    }
}