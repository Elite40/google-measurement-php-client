<?php
namespace Racecore\GATracking\Tracking;

/**
 * Google Analytics Measurement PHP Class
 * Licensed under the 3-clause BSD License.
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * Google Documentation
 * https://developers.google.com/analytics/devguides/collection/protocol/v1/
 *
 * @author  Enea Berti
 * @email   reysharks(at)gmail.com
 * @git     https://github.com/reysharks
 * @url     http://www.adacto.it
 * @package Racecore\GATracking\Tracking
 */
class Item extends AbstractTracking
{

    private $tid = 0;
    private $name = '';
    private $price = 0;
    private $quantity = 0;
    private $sku = '';
    private $category = '';
    private $currency = '';

    /**
     * Set the Transaction ID
     *
     * @author  Enea Berti
     * @param $id
     */
    public function setTransactionID($tid)
    {

        $this->tid = $tid;
    }

    /**
     * Returns the Transaction ID
     *
     * @author  Enea Berti
     * @return integer
     */
    public function getTransactionID()
    {

        if (!$this->tid) {
            return '/';
        }

        return $this->tid;
    }

    /**
     * Sets the Item Name
     *
     * @author  Enea Berti
     * @param $name
     */
    public function setName($name)
    {

        $this->name = $name;
    }

    /**
     * Return Name
     *
     * @author  Enea Berti
     * @return string
     */
    public function getName()
    {

        if (!$this->name) {
            return $this->sku;
        }

        return $this->name;
    }

    /**
     * Sets the Item Price
     *
     * @author  Enea Berti
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Return the Price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the Quantity
     *
     * @author  Enea Berti
     * @param $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Return Quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the Sku
     *
     * @author  Enea Berti
     * @param $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * Return the Sku
     *
     * @return float
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Sets the Category
     *
     * @author  Enea Berti
     * @param $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Return the Category
     *
     * @return float
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the Currency
     *
     * @author  Enea Berti
     * @param $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * Return the Currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Return the Transaction Host Address
     *
     * @author  Enea Berti
     * @param $host
     * @return $this
     */
    public function setTransactionHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionHost()
    {
        return $this->host;
    }

    /**
     * Returns the Google Paket for Item Tracking
     *
     * @author  Enea Berti
     * @return array
     */
    public function getPaket()
    {
        /*
        &t=item          // Item hit type.
        &ti=12345        // Transaction ID. Required.
        &in=sofa         // Item name. Required.
        &ip=300          // Item price.
        &iq=2            // Item quantity.
        &ic=u3eqds43     // Item code / SKU.
        &iv=furniture    // Item variation / category.
        &cu=EUR          // Currency code.
        */
        return array(
            't' => 'item',
            'ti' => $this->getTransactionID(),
            'in' => $this->getName(),
            'ip' => $this->getPrice(),
            'iq' => $this->getQuantity(),
            'ic' => $this->getSku(),
            'iv' => $this->getCategory(),
            'dh' => $this->getTransactionHost(),
            'cu' => $this->getCurrency()
        );
    }

}