<?php

/*
 * This file is part of Mount7 GmbH EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace Mount7\EasyCredit\Core\Exception;

use OxidEsales\Eshop\Core\Exception\StandardException;

/**
 * Exception base class for easyCredit
 */
class EasyCreditException extends StandardException
{
    /**
     * EasyCreditException constructor.
     *
     * @param string $sMessage
     * @param int    $iCode
     */
    public function __construct($sMessage, $iCode = 0)
    {
        parent::__construct($sMessage, $iCode);
    }
}
