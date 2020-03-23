<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Matisse Laurel
 *
 */

namespace Born\Newsletters\Plugin;

use Magento\Framework\App\Request\Http;

class Subscriber {
    protected $request;
    public function __construct(Http $request){
        $this->request = $request;
    }

    public function aroundSubscribe($subject, \Closure $proceed, $email) {

        if ($this->request->isPost() && $this->request->getPost('frequency')) { 

            $frequency = $this->request->getPost('frequency');
            $disclaimer_agreed = $this->request->getPost('disclaimer_agreed');

            $subject->setFrequency($frequency);
            $subject->setDisclaimerAgreed($disclaimer_agreed);
            $result = $proceed($email);

            try {
                $subject->save();
            }catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }
        return $result;
    }
}