<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\ShareCart\Model;

use Born\ShareCart\Api\GetSessionDataManagementInterface;
use Magento\Customer\Model\Session;

/**
 * Class GetSessionDataManagement
 * @package Born\ShareCart\Model
 */
class GetSessionDataManagement implements GetSessionDataManagementInterface
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * GetSessionDataManagement constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
    * {@inheritdoc}
    */

    public function getGetSessionData()
    {
        if ($this->session->getCustomer()->getEmail()) {
            return ['name'=>$this->session->getCustomer()->getName(),'email'=>$this->session->getCustomer()->getEmail(),'id'=>$this->session->getCustomer()->getCustomerId()];
        } else {
            return [];
        }
    }
}
