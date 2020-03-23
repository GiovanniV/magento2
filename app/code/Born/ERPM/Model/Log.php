<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Born\ERPM\Model;

use Born\ERPM\Api\Data\LogInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Import history model
 *
 * @api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.LongVariable)
 * @since 100.0.2
 */
class Log extends AbstractModel implements LogInterface
{
    /**
     * Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Born\ERPM\Model\ResourceModel\Log');
    }

    /**
     * @return mixed
     */
    public function getId(){
        return $this->getData(self::LOG_ID);
    }

    /**
     * @return mixed
     */
    public function getApiName(){
        return $this->getData(self::API_NAME);
    }

    /**
     * @return mixed
     */
    public function getCreatedAt(){
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @return mixed
     */
    public function getStoreId(){
        return $this->getData(self::STORE_ID);
    }

    /**
     * @return mixed
     */
    public function getRequest(){
        return $this->getData(self::REQUEST);
    }

    /**
     * @return mixed
     */
    public function getResponse(){
        return $this->getData(self::RESPONSE);
    }

    /**
     * @return mixed
     */
    public function getAdditional(){
        return $this->getData(self::ADDITIONAL);
    }

    /**
     * @return mixed
     */
    public function getMessage(){
        return $this->getData(self::MESSAGE);
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id){
        return $this->setData(self::LOG_ID, $id);
    }

    /**
     * @param $requestType
     * @return $this
     */
    public function setApiName($requestType){
        return $this->setData(self::API_NAME, $requestType);
    }

    /**
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt){
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @param $storeId
     * @return $this
     */
    public function setStoreId($storeId){
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * @param $request
     * @return $this
     */
    public function setRequest($request){
        return $this->setData(self::REQUEST, $request);
    }

    /**
     * @param $response
     * @return $this
     */
    public function setReponse($response){
        return $this->setData(self::RESPONSE, $response);
    }

    /**
     * @param $additional
     * @return $this
     */
    public function setAdditional($additional){
        return $this->setData(self::ADDITIONAL, $additional);
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message){
        return $this->setData(self::MESSAGE, $message);
    }
}