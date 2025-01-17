<?php

/*
 * This file is part of Mount7 GmbH EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace Mount7\EasyCredit\Core\Api;

use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use Mount7\EasyCredit\Core\Di\EasyCreditConfigException;
use Mount7\EasyCredit\Core\Di\EasyCreditDic;

/**
 * Class EasyCreditWebServiceClientFactory
 *
 * Builds a web service client capable for the specified rest function.
 */
class EasyCreditWebServiceClientFactory
{
    /**
     * @param string $serviceName
     * @param EasyCreditDic $dic
     * @param array|null $additionalArguments
     * @param array|null $queryArguments
     * @param bool $addheaders
     *
     * @return EasyCreditWebServiceClient
     * @throws SystemComponentException
     * @throws EasyCreditConfigException
     * @throws EasyCreditCurlException
     */
    public static function getWebServiceClient(
        $serviceName,
        EasyCreditDic $dic,
        array $additionalArguments = [],
        array $queryArguments = [],
        $addheaders = false
    ) {
        /** @var EasyCreditWebServiceClient $client */
        $client = oxNew(EasyCreditWebServiceClient::class);

        $apiConfig = $dic->getApiConfig();

        $client->setLogging($dic->getLogging());
        $client->setHttpmethod($apiConfig->getServiceHttpMethod($serviceName));
        $client->setBaseUrl($apiConfig->getBaseUrl($serviceName));
        $client->setFunction(
            $apiConfig->getServiceRestFunction($serviceName),
            $additionalArguments,
            array_merge($apiConfig->getServiceRestFunctionArguments($serviceName), $queryArguments)
        );

        $scheme = $apiConfig->getValidationScheme($serviceName);
        if ($scheme) {
            $client->setResponseValidator(
                oxNew(
                    EasyCreditResponseValidator::class,
                    $scheme
                )
            );
        }

        if ($addheaders) {
            $headers = [
                "Content-Type: application/json;charset=UTF-8",
                "tbk-rk-shop: " . $apiConfig->getWebshopId(),
                "tbk-rk-token: " . $apiConfig->getWebShopToken(),
            ];
            $client->setRequestHeaders($headers);
        }

        return $client;
    }
}
