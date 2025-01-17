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

/**
 * Exception base class for easyCredit, specialized about failed initialization data
 */
class EasyCreditInitializationFailedException extends EasyCreditException
{
    /**
     * EasyCreditInitializationFailedException constructor.
     *
     * @param string $sMessage
     * @param int    $iCode
     */
    public function __construct($sMessage = "OXPS_EASY_CREDIT_ERROR_INITIALIZATION_FAILED", $iCode = 0)
    {
        parent::__construct($sMessage, $iCode);
    }
}
