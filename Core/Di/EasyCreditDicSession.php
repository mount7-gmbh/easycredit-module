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

use OxidEsales\Eshop\Core\Session;
use Mount7\EasyCredit\Core\Dto\EasyCreditStorage;

/**
 * Class DicSession
 *
 * Pipe get, set and delete to underlying Session.
 */
class EasyCreditDicSession implements EasyCreditDicSessionInterface
{
    /** @var Session */
    private $session;

    /**
     * DicSession constructor.
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Returns the value for the key.
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->session->getVariable($key);
    }

    /**
     * Sets the value for the key.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        $this->session->setVariable($key, $value);
    }

    /**
     * Deletes the key/value pair.
     *
     * @param string $key
     */
    public function delete($key)
    {
        $this->session->deleteVariable($key);
    }

    /**
     * Appends url with session ID, but only if Session::_isSidNeeded() returns true
     * Direct usage of this method to retrieve end url result is discouraged - instead
     * see oxUtilsUrl::processUrl
     *
     * @param string $sUrl url to append with sid
     *
     * @see oxUtilsUrl::processUrl
     *
     * @return string
     */
    public function processUrl($sUrl)
    {
        return $this->session->processUrl($sUrl);
    }

    /**
     * Returns session ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->session->getId();
    }

    /**
     * Sets storage for easyCredit information
     *
     * @param $storage EasyCreditStorage
     */
    public function setStorage($storage)
    {
        $this->session->setStorage($storage);
    }

    /**
     * Returns storage for easyCredit information
     *
     * @return null|EasyCreditStorage
     */
    public function getStorage()
    {

        return $this->session->getStorage();
    }

    /**
     * Clears storage for easyCredit information
     */
    public function clearStorage()
    {

        $this->session->clearStorage();
    }
}
