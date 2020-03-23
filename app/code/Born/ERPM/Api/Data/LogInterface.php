<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\ERPM\Api\Data;

interface LogInterface
{
    const LOG_ID = 'log_id';

    const API_NAME = 'api_name';

    const CREATED_AT = 'created_at';

    const STORE_ID = 'store_id';

    const REQUEST = 'request';

    const RESPONSE = 'response';

    const ADDITIONAL = 'additional';

    const MESSAGE = 'message';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getApiName();

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @return mixed
     */
    public function getStoreId();

    /**
     * @return mixed
     */
    public function getRequest();

    /**
     * @return mixed
     */
    public function getResponse();

    /**
     * @return mixed
     */
    public function getAdditional();

    /**
     * @return mixed
     */
    public function getMessage();

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id);

    /**
     * @param $apiName
     * @return $this
     */
    public function setApiName($apiName);

    /**
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * @param $storeId
     * @return $this
     */
    public function setStoreId($storeId);

    /**
     * @param $request
     * @return $this
     */
    public function setRequest($request);

    /**
     * @param $response
     * @return $this
     */
    public function setReponse($response);

    /**
     * @param $additional
     * @return $this
     */
    public function setAdditional($additional);

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message);
}