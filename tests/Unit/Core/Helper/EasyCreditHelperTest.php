<?php

declare(strict_types=1);

/*
 * This file is part of Mount7 GmbH EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace Unit\Core\Helper;

use Mount7\EasyCredit\Core\Helper\EasyCreditHelper;
use PHPUnit\Framework\TestCase;

final class EasyCreditHelperTest extends TestCase
{
    public function testHasPackstationFormatNormal()
    {
        $this->assertFalse(EasyCreditHelper::hasPackstationFormat('Teststraße', '7'));
    }

    public function testHasPackstationFormatNumericNoNumericPackStation1()
    {
        $this->assertFalse(EasyCreditHelper::hasPackstationFormat('014', ''));
    }

    public function testHasPackstationFormatNumericNoNumericPackStation2()
    {
        $this->assertFalse(EasyCreditHelper::hasPackstationFormat('', '014'));
    }

    public function testHasPackstationFormatNumericPackStation()
    {
        $this->assertTrue(EasyCreditHelper::hasPackstationFormat('014', '4711'));
    }

    public function testHasPackstationFormatNonNumericPackStation1()
    {
        $this->assertTrue(EasyCreditHelper::hasPackstationFormat('Packstation 014', ''));
    }

    public function testHasPackstationFormatNonNumericPackStation2()
    {
        $this->assertTrue(EasyCreditHelper::hasPackstationFormat('', 'Packstation 4711'));
    }

    public function testGetShopSystemCE()
    {
        $shop = new \stdClass();
        $shop->oxshops__oxedition = new \stdClass();
        $shop->oxshops__oxedition->value = 'CE';

        $this->assertEquals('Community Edition', EasyCreditHelper::getShopSystem($shop));
    }

    public function testGetShopSystemPE()
    {
        $shop = new \stdClass();
        $shop->oxshops__oxedition = new \stdClass();
        $shop->oxshops__oxedition->value = 'PE';

        $this->assertEquals('Professional Edition', EasyCreditHelper::getShopSystem($shop));
    }

    public function testGetShopSystemEE()
    {
        $shop = new \stdClass();
        $shop->oxshops__oxedition = new \stdClass();
        $shop->oxshops__oxedition->value = 'EE';

        $this->assertEquals('Enterprise Edition', EasyCreditHelper::getShopSystem($shop));
    }

}
