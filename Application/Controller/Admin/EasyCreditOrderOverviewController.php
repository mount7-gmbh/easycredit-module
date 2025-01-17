<?php

/*
 * This file is part of Mount7 GmbH EasyCredit module
 *
 * Copyright (C) Mount7 GmbH
 * Portions Copyright (C) OXID eSales AG 2003-2022
 *
 * Licensed under the GNU GPL v3 - See the file LICENSE for details.
 */

namespace Mount7\EasyCredit\Application\Controller\Admin;

use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Core\Field;
use Mount7\EasyCredit\Application\Model\EasyCreditTradingApiAccess;

/**
 * Class EasyCreditOrderOverviewController
 * Extends the order overviww controller with functionality used for easy credit payment orders.
 * Extend sendOrder method to set state at ec interface to delivered
 *
 * @package OxidProfessionalServices\EasyCredit\Application\Controller\Admin
 */
class EasyCreditOrderOverviewController extends EasyCreditOrderOverviewController_parent
{
    /**
     * @var Order
     */
    protected $order;

    /**
     * Set the state to delivered at easy credit trading gateway.
     *
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     * @throws \OxidProfessionalServices\EasyCredit\Core\Api\EasyCreditCurlException
     */
    public function sendOrder()
    {
        parent::sendOrder();
        $functionalId = $this->loadFunctionalIdFromOrder();
        if (!is_null($functionalId)) {
            $this->setOrderDelivered();
        }
    }

    /**
     * Load the EasyCredit order state from easy credit trading gateway.
     *
     * @param string $functionalId The easy credit functional id for this order
     *
     * @return array|string
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     * @throws \OxidProfessionalServices\EasyCredit\Core\Api\EasyCreditCurlException
     */
    public function getDeliveryState($order)
    {
        $tradingApiService = $this->getService($order);
        return $tradingApiService->getOrderState();
    }

    /**
     * Load functional id from current order.
     *
     * @return string|null
     */
    protected function loadFunctionalIdFromOrder()
    {
        $this->loadOrder();

        return $this->order->oxorder__ecredfunctionalid->value;
    }

    /**
     * Get the ec trading api access service.
     *
     * @return EasyCreditTradingApiAccess
     */
    protected function getService($order)
    {
        $tradingApiService = oxNew(EasyCreditTradingApiAccess::class, $order);
        return $tradingApiService;
    }

    /**
     * Load current order identified by edited object id
     */
    protected function loadOrder()
    {
        if (!$this->order) {
            $order = oxNew(Order::class);
            if ($order->load($this->getEditObjectId())) {
                $this->order = $order;
            }
        }

        return $this->order;
    }

    /**
     * Set order delivered state at easy credit interface and in order data.
     */
    protected function setOrderDelivered(): void
    {
        $tradingApiService = $this->getService($this->order);
        $tradingApiService->setOrderDeliveredState();

        $orderdata = $tradingApiService->getOrderData();
        $state = $orderdata[0]->haendlerstatusV2;

        $order = $this->loadOrder();
        $order->oxorder__ecreddeliverystate = new Field($state, Field::T_RAW);
        $order->save();
    }

}
