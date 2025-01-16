<?php
declare(strict_types=1);

namespace Unit\Core\Helper;

use OxidEsales\Eshop\Application\Model\User;
use OxidProfessionalServices\EasyCredit\Core\Helper\EasyCreditInitializeRequestBuilder;
use PHPUnit\Framework\TestCase;

class EasyCreditInitializeRequestBuilderTest extends TestCase
{
    protected function setUp(): void
    {
        $this->userMock = $this->getMockBuilder(stdClass::class)
            ->addMethods(['oxuser__oxfname', 'oxuser__oxlname'])
            ->getMock();

        // Set up the mock methods
        $this->userMock->method('oxuser__oxfname')->willReturn('John');
        $this->userMock->method('oxuser__oxlname')->willReturn('Doe');

        // Mock the object that has the getPersonals method
        $this->classMock = $this->getMockBuilder(EasyCreditInitializeRequestBuilder::class)
            ->onlyMethods(['getUser', 'getSalutation', 'convertBirthday']) // use 'onlyMethods' here
            ->getMock();

        // Setup mocked methods
        $this->classMock->method('getUser')->willReturn($this->userMock);
        $this->classMock->method('getSalutation')->willReturn('Mr.');
        $this->classMock->method('convertBirthday')->willReturn('1980-01-01');
    }

    public function testGetPersonals(): void
    {
        // Creating a reflection method
        $reflection = new ReflectionMethod($this->classMock, 'getPersonals');
        $reflection->setAccessible(true);

        // Call the method
        $result = $reflection->invoke($this->classMock);

        // Assert the result
        $this->assertSame([
            'anrede' => 'Mr.',
            'vorname' => 'John',
            'nachname' => 'Doe',
            'geburtsdatum' => '1980-01-01'
        ], $result);
    }
}