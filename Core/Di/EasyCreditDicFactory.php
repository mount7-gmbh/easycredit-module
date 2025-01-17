<?php

/*
 * This file is part of Mount7 GmbH EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace Mount7\EasyCredit\Core\Di;

use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Eshop\Core\Registry;
use Mount7\EasyCredit\Application\Model\EasyCreditTradingApiAccess;
use Mount7\EasyCredit\Core\CrossCutting\EasyCreditLogging;
use Mount7\EasyCredit\Core\PayLoad\EasyCreditPayloadFactory;

/**
 * Class DicFactory
 *
 * Building a Dependency injection container with unmocked data, e.g. current oxSession and module config.
 */
class EasyCreditDicFactory
{
    /**
     * Creates and returns an unmocked Dic container.
     *
     * @return EasyCreditDic
     * @throws SystemComponentException
     */
    public static function getDic()
    {
        return oxNew(
            EasyCreditDic::class,
            oxNew(EasyCreditDicSession::class, Registry::getSession()),
            oxNew(EasyCreditApiConfig::class, self::getApiConfigArray()),
            oxNew(EasyCreditPayloadFactory::class),
            oxNew(EasyCreditLogging::class, self::getLoggingConfigArray()),
            oxNew(EasyCreditDicConfig::class, Registry::getConfig())
        );
    }

    public static function getApiConfigArray()
    {
        $config = Registry::getConfig();

        $services = self::getServices();
        $validationSchemes = self::getValidationSchemes();

        return [
            EasyCreditApiConfig::API_CONFIG_CREDENTIALS => [
                EasyCreditApiConfig::API_CONFIG_CREDENTIAL_BASE_URL      => $config->getConfigParam('oxpsECBaseUrl'),
                EasyCreditApiConfig::API_CONFIG_CREDENTIAL_APP_URL       => $config->getConfigParam('oxpsECDealerInterfaceUrl'),
                EasyCreditApiConfig::API_CONFIG_CREDENTIAL_WEBSHOP_ID    => $config->getConfigParam('oxpsECWebshopId'),
                EasyCreditApiConfig::API_CONFIG_CREDENTIAL_WEBSHOP_TOKEN => $config->getConfigParam('oxpsECWebshopToken'),
            ],
            EasyCreditApiConfig::API_CONFIG_SERVICES => $services,
            EasyCreditApiConfig::API_CONFIG_VALIDATION_SCHEMES => $validationSchemes,
        ];
    }

    private static function getLoggingConfigArray()
    {
        $config = Registry::getConfig();
        return [
            EasyCreditLogging::LOG_CONFIG_LOG_DIR     => $config->getLogsDir(),
            EasyCreditLogging::LOG_CONFIG_LOG_ENABLED => $config->getConfigParam('oxpsECLogging'),
        ];
    }

    private static function getJsonFromFile($filepath)
    {
        $json = file_get_contents($filepath);
        return json_decode($json, true);
    }

    private static function getServices()
    {
        return self::getJsonFromFile(__DIR__ . '/Config/services.json');
    }

    private static function getValidationSchemes()
    {
        return self::getJsonFromFile(__DIR__ . '/Config/validation.json');
    }
}
