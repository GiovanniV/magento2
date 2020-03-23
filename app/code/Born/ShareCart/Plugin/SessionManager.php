<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\ShareCart\Plugin;

use Magento\Framework\Session\SessionManager as SessionManagerper;

/**
 * Class SessionManager
 * @package Born\ShareCart\Plugin
 */
class SessionManager
{
    /**
     * SessionManager constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(\Magento\Framework\App\RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @param SessionManagerper $subject
     * @param $sessionId
     * @return $this
     */
    public function afterSetSessionId(SessionManagerper $subject, $sessionId)
    {
        if ($this->request->getParam('SID')) {
            session_id($this->request->getParam('SID'));
        }
        return $this;
    }
}
