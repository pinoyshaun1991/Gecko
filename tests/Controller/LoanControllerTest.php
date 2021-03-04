<?php

use PHPUnit\Framework\TestCase;
use lendInvest\Controller\LoanController;

class LoanControllerTest extends TestCase
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
        $reflector = new \ReflectionClass(LoanController::class);
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
            [0.03, 1000, 28.06, null, 1000, '2020-10-03'], //Tranche A
            [0.06, 500, 21.29, null, 500, '2020-10-10'] //Tranche B
        ];
    }
}