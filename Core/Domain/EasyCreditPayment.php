<?php

/*
 * This file is part of Mount7 GmbH EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace Mount7\EasyCredit\Core\Domain;

use OxidEsales\Eshop\Core\Registry;

/**
 * Class oxpsEasyCreditOxPayment
 */
class EasyCreditPayment extends EasyCreditPayment_parent
{
    /** string paymentid */
    public const EASYCREDIT_PAYMENTID = "easycreditinstallment";

    /**
     * Returns true if payment is ratenkauf by easyCredit
     *
     * @return bool
     */
    public function isEasyCreditInstallment()
    {
        return $this->isEasyCreditInstallmentById($this->getId());
    }

    /**
     * Returns true if payment is ratenkauf by easyCredit
     *
     * @param $paymentId string
     *
     * @return bool
     */
    public function isEasyCreditInstallmentById($paymentId)
    {
        return $paymentId == self::EASYCREDIT_PAYMENTID;
    }
}
