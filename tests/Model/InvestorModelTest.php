<?php

use lendInvest\Model\InvestorModel;
use PHPUnit\Framework\TestCase;

class InvestorModelTest extends TestCase
{
    /**
     * @dataProvider walletAmountProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetWalletAmount($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(InvestorModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setWalletAmount');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function walletAmountProvider()
    {
        return [
            [null, 'Amount invested needs to be a numeric value'],
            ['abc', 'Amount invested needs to be a numeric value'],
            ['45-54-123', 'Amount invested needs to be a numeric value'],
            ['01-03-2021abc', 'Amount invested needs to be a numeric value'],
            [1500, 'There is not enough money to invest this amount and tranche is smaller than the amount requested'],
            [2000, 'There is not enough money to invest this amount and tranche is smaller than the amount requested'],
            [30000, 'There is not enough money to invest this amount and tranche is smaller than the amount requested']
        ];
    }

    /**
     * @dataProvider walletAmountWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testWalletAmountWithoutException($parameter, $expected) : void
    {
        $mockedClass = $this->createMock(InvestorModel::class);
        $mockedClass->method('setWalletAmount')
            ->willReturn($expected);
        $this->assertEquals($expected, $mockedClass->setWalletAmount($parameter));
    }

    public function walletAmountWithoutExceptionProvider()
    {
        return [
            [400, 600],
            [300, 700]
        ];
    }

    public function testGetWallet() : void
    {
        $mockedClass = $this->createMock(InvestorModel::class);
        $mockedClass->method('getWallet')
            ->willReturn(1000);
        $this->assertEquals(1000, $mockedClass->getWallet());
    }

    /**
     * @dataProvider amountInvestedProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetAmountInvested($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(InvestorModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setAmountInvested');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function amountInvestedProvider()
    {
        return [
            [null, 'Amount invested needs to be a numeric value'],
            ['abc', 'Amount invested needs to be a numeric value'],
            ['45-54-123', 'Amount invested needs to be a numeric value'],
            ['01-03-2021abc', 'Amount invested needs to be a numeric value']
        ];
    }

    /**
     * @dataProvider amountInvestedWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function amountInvestedWithoutException($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(InvestorModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setAmountInvested');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function amountInvestedWithoutExceptionProvider()
    {
        return [
            [400, 400],
            [250, 250]
        ];
    }

    public function testGetAmountInvested() : void
    {
        $mockedClass = $this->createMock(InvestorModel::class);
        $mockedClass->method('getAmountInvested')
            ->willReturn(1000);
        $this->assertEquals(1000, $mockedClass->getAmountInvested());
    }

    /**
     * @dataProvider updateWalletProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testUpdateWallet($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(InvestorModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('updateWallet');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function updateWalletProvider()
    {
        return [
            [null, 'Interest needs to be a float value'],
            ['abc', 'Interest needs to be a float value'],
            ['45-54-123', 'Interest needs to be a float value'],
            ['01-03-2021abc', 'Interest needs to be a float value'],
            [1500, 'Interest needs to be a float value'],
            [2000, 'Interest needs to be a float value'],
            [30000, 'Interest needs to be a float value']
        ];
    }

    /**
     * @dataProvider updateWalletWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testUpdateWalletWithoutException($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(InvestorModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('updateWallet');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function updateWalletWithoutExceptionProvider()
    {
        return [
            [400.00, 400.00],
            [250.00, 250.00]
        ];
    }
}