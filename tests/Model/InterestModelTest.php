<?php

use lendInvest\Model\InterestModel;
use PHPUnit\Framework\TestCase;

class InterestModelTest extends TestCase
{
    /**
     * @dataProvider interestProvider
     *
     * @param $interestRate
     * @param $amountInvested
     * @param $expected
     * @param null $expectedMessage
     * @param $amount
     * @param $date
     * @throws ReflectionException
     */
    public function testGetInterest($interestRate, $amountInvested, $expected, $expectedMessage = null, $amount, $date) : void
    {
        $reflector = new \ReflectionClass(InterestModel::class);
        $instance  = $reflector->newInstance();
        $method    = $reflector->getMethod('getInterest');
        $method->setAccessible(true);

        if (!is_null($expectedMessage)) {
            $this->expectExceptionMessage($expectedMessage);
            $method->invoke($instance, $interestRate, $amountInvested, $amount, $date);
        } else {
            $this->assertEquals($expected, $method->invoke($instance, $interestRate, $amountInvested, $amount, $date));
        }
    }

    public function interestProvider()
    {
        return [
            [0.03, 1000, 28.06, null, 1000, '2020-10-03'], //Investor 1 - Tranche A
            [0.03, 1, null, 'Maximum amount reached for investment', 0, '2020-10-04'], //Investor 2 - Tranche A
            [0.06, 500, 21.29, null, 500, '2020-10-10'], //Investor 3 - Tranche B
            [0.06, 1100, null, 'There is not enough money to invest this amount and tranche is smaller than the amount requested', 500, '2020-10-25'], //Investor 4 - Tranche B
            [0.06, 1000, null, 'Tranche is smaller than amount invested', 500, '2020-10-25'], //Investor 4 - Tranche B
        ];
    }

    /**
     * @dataProvider startDateProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetStartDate($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(InterestModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setStartDate');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function startDateProvider()
    {
        return [
            [null, 'Loan start date is required'],
            ['3432-432-3424', 'Invalid investment date'],
            ['45-54-123', 'Invalid investment date'],
            ['01-03-2021', 'Invalid investment date']
        ];
    }

    /**
     * @dataProvider startDateWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetStartDateWithoutException($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(InterestModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setStartDate');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function startDateWithoutExceptionProvider()
    {
        return [
            ['2021-01-02', '2021-01-02'],
            ['2021-03-21', '2021-03-21']
        ];
    }

    public function testGetStartDate() : void
    {
        $mockedClass = $this->createMock(InterestModel::class);
        $mockedClass->method('getStartDate')
            ->willReturn('2021-03-21');
        $this->assertEquals('2021-03-21', $mockedClass->getStartDate());
    }

    /**
     * @dataProvider endDateProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetEndDate($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(InterestModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setEndDate');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function endDateProvider()
    {
        return [
            [null, 'Loan end date is required'],
            ['3432-432-3424', 'Invalid investment date'],
            ['45-54-123', 'Invalid investment date'],
            ['01-03-2021', 'Invalid investment date']
        ];
    }

    /**
     * @dataProvider endDateWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetEndDateWithoutException($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(InterestModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setEndDate');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function endDateWithoutExceptionProvider()
    {
        return [
            ['2021-01-02', '2021-01-02'],
            ['2021-03-21', '2021-03-21']
        ];
    }

    public function testGetEndDate() : void
    {
        $mockedClass = $this->createMock(InterestModel::class);
        $mockedClass->method('getEndDate')
            ->willReturn('2021-03-21');
        $this->assertEquals('2021-03-21', $mockedClass->getEndDate());
    }

    /**
     * @dataProvider investmentDateProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetInvestmentDate($parameter, $expectedMessage) : void
    {
        $reflector = new \ReflectionClass(InterestModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setInvestmentDate');
        $method->setAccessible(true);
        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function investmentDateProvider()
    {
        return [
            [null, 'Investment date is required'],
            ['3432-432-3424', 'Invalid investment date'],
            ['45-54-123', 'Invalid investment date'],
            ['01-03-2021', 'Invalid investment date'],
            ['2021-03-01', 'Investment date must be between loan period']
        ];
    }

    /**
     * @dataProvider investmentDateWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetInvestmentDateWithoutException($parameter, $expected) : void
    {
        $reflector = new \ReflectionClass(InterestModel::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setInvestmentDate');
        $method->setAccessible(true);

        $this->assertEquals($expected, $method->invoke($instance, $parameter));
    }

    public function investmentDateWithoutExceptionProvider()
    {
        return [
            ['2020-10-02', '2020-10-02'],
            ['2020-10-15', '2020-10-15']
        ];
    }

    public function testGetInvestmentDate() : void
    {
        $mockedClass = $this->createMock(InterestModel::class);
        $mockedClass->method('getInvestmentDate')
            ->willReturn('2020-10-15');
        $this->assertEquals('2020-10-15', $mockedClass->getInvestmentDate());
    }
}