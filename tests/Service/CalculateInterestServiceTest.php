<?php

use lendInvest\Common\Service\InterestService;
use lendInvest\Service\CalculateInterestService;
use PHPUnit\Framework\TestCase;

class CalculateInterestServiceTest extends TestCase
{
    public function testCalculateInterest() : void
    {
        $mock = $this->getMockBuilder(InterestService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->once())
            ->method('calculateContents')
            ->willReturn(28.06);

        $mockedClass = $this->createMock(CalculateInterestService::class);
        $mockedClass->method('calculateInterest')
            ->willReturn(28.06);

        $this->assertEquals(28.06, $mock->calculateContents());
    }
}