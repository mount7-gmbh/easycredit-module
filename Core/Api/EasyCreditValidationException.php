<?php

/*
 * This file is part of OXID EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace OxidProfessionalServices\EasyCredit\Core\Api;

use OxidEsales\Eshop\Core\Exception\StandardException;

class EasyCreditValidationException extends StandardException
{
    /**
     * EasyCreditValidationException constructor.
     *
     * @param string $sMessage
     * @param int $iCode
     */
    public function __construct($sMessage = "not set", $iCode = 0)
    {
        parent::__construct($sMessage, $iCode);
    }
}
