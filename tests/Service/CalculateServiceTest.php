<?php

use gecko\Common\Service\CalculateGeneralService;
use gecko\Service\CalculateService;
use PHPUnit\Framework\TestCase;

class CalculateServiceTest extends TestCase
{
    public function testCalculate() : void
    {
        $mock = $this->getMockBuilder(CalculateGeneralService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->once())
            ->method('calculateContents')
            ->willReturn(21);

        $mockedClass = $this->createMock(CalculateService::class);
        $mockedClass->method('calculate')
            ->willReturn(21);

        $this->assertEquals(21, $mock->calculateContents(20));
    }
}