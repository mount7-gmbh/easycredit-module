<?php

/*
 * This file is part of OXID EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace OxidProfessionalServices\EasyCredit\Core\Di;

use OxidProfessionalServices\EasyCredit\Core\CrossCutting\EasyCreditLogging;
use OxidProfessionalServices\EasyCredit\Core\PayLoad\EasyCreditPayloadFactory;

/**
 * Class Dic
 *
 * Providing session-, config-data and payload factory instance.
 */
class EasyCreditDic
{
    /** @var EasyCreditDicSession */
    private $dicSession;

    /** @var EasyCreditApiConfig */
    private $apiConfig;

    /** @var EasyCreditPayloadFactory */
    private $payloadFactory;

    /** @var EasyCreditLogging */
    private $logging;

    /** @var EasyCreditDicConfig */
    private $dicConfig;

    /**
     * Dic constructor.
     *
     * @param EasyCreditDicSession     $dicSession
     * @param EasyCreditApiConfig      $apiConfig
     * @param EasyCreditPayloadFactory $payloadFactory
     * @param EasyCreditLogging        $logging
     * @param EasyCreditDicConfig          $dicConfig
     */
    public function __construct($dicSession, $apiConfig, $payloadFactory, $logging, $dicConfig)
    {
        $this->dicSession = $dicSession;
        $this->apiConfig = $apiConfig;
        $this->payloadFactory = $payloadFactory;
        $this->logging = $logging;
        $this->dicConfig = $dicConfig;
    }

    /**
     * @return EasyCreditDicSession
     * @codeCoverageIgnore
     */
    public function getSession()
    {
        return $this->dicSession;
    }

    /**
     * @return EasyCreditApiConfig
     * @codeCoverageIgnore
     */
    public function getApiConfig()
    {
        return $this->apiConfig;
    }

    /**
     * @return EasyCreditPayloadFactory
     * @codeCoverageIgnore
     */
    public function getPayloadFactory()
    {
        return $this->payloadFactory;
    }

    /**
     * @return EasyCreditLogging
     * @codeCoverageIgnore
     */
    public function getLogging()
    {
        return $this->logging;
    }

    /**
     * @return EasyCreditDicConfig
     * @codeCoverageIgnore
     */
    public function getConfig()
    {
        return $this->dicConfig;
    }


}
