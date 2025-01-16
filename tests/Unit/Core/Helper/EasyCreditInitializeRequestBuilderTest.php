<?php
declare(strict_types=1);

namespace Unit\Core\Helper;

use OxidProfessionalServices\EasyCredit\Core\Helper\EasyCreditInitializeRequestBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EasyCreditInitializeRequestBuilderTest extends TestCase
{


    private function createUserMock(string $firstName, string $lastName, string $salutation = '', string $birthday): \stdClass
    {
        $userMock = new \stdClass();
        $userMock->oxuser__oxfname = (object)['value' => $firstName];
        $userMock->oxuser__oxlname = (object)['value' => $lastName];
        $userMock->oxuser__oxsal = (object)['value' => $salutation];
        $userMock->oxuser__oxbirthdate = (object)['value' => $birthday];
        return $userMock;
    }

    private function createEasyCreditInitializeRequestBuilderMock(\stdClass $userMock): MockObject
    {
        $mock = $this->getMockBuilder(EasyCreditInitializeRequestBuilder::class)
            ->onlyMethods(['getUser'])
            ->getMock();
        $mock->method('getUser')->willReturn($userMock);
        return $mock;
    }

    /**
     * @dataProvider personalDetailsDataProvider
     */
    public function testGetPersonals(string $firstName, string $lastName, string $salutation, string $birthday, array $expectedResult): void
    {
        $userMock = $this->createUserMock($firstName, $lastName, $salutation, $birthday);
        $builderMock = $this->createEasyCreditInitializeRequestBuilderMock($userMock);

        $reflection = new \ReflectionMethod($builderMock, 'getPersonals');
        $reflection->setAccessible(true);
        $personalDetails = $reflection->invoke($builderMock);

        $this->assertSame($expectedResult, $personalDetails);
    }


    public function personalDetailsDataProvider(): array
    {
        return [
            ['John', 'Doe', 'MR', '1980-01-01', [
                'anrede' => 'HERR',
                'vorname' => 'John',
                'nachname' => 'Doe',
                'geburtsdatum' => '1980-01-01'
            ]],
            ['John', 'Doe', '', '0000-00-00', [
                'anrede' => null,
                'vorname' => 'John',
                'nachname' => 'Doe',
                'geburtsdatum' => null,
            ]],
            ['Mount7 ', 'Team', 'MRS', '0000-00-00', [
                'anrede' => 'FRAU',
                'vorname' => 'Mount ',
                'nachname' => 'Team',
                'geburtsdatum' => null,
            ]],
            ['M ', 'Team1234thatis longer than twenty sevengasdf', 'MRS', '0000-00-00', [
                'anrede' => 'FRAU',
                'vorname' => 'M ',
                'nachname' => 'Teamthatis longer than ',
                'geburtsdatum' => null,
            ]],
            ['ZäüößÄÖÜěščřžůďťňĎŇŤŠČŘŽŮĚO', 'Team1234thatis longer than twenty sevengasdf', 'MRS', '0000-00-00', [
                'anrede' => 'FRAU',
                'vorname' => 'ZäüößÄÖÜěščřžůďťňĎŇŤŠČŘŽŮĚO',
                'nachname' => 'Teamthatis longer than ',
                'geburtsdatum' => null,
            ]],
        ];
    }

}