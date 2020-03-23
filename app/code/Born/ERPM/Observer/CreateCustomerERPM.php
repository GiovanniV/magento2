<?php

namespace Born\ERPM\Observer;

use Magento\Framework\Event\Observer;

use Born\ERPM\Model\Method\Person;
use \Magento\Framework\App\RequestInterface;
use Magento\Framework\Registry;

/**
 * Class newsletterSub
 * @package Born\SFMC\Observer
 */
class CreateCustomerERPM implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var Person
     */
    protected $_person;

    /**
     * @var RequestInterface
     */
    protected $_request;

    /**
     * @var Registry
     */
    protected $_registry;

    /**
     * CreateCustomerERPM constructor.
     * @param Person $person
     * @param RequestInterface $request
     * @param Registry $registry
     */
    public function __construct(
        Person $person,
        RequestInterface $request,
        Registry $registry
    )
    {
        $this->_person = $person;
        $this->_request = $request;
        $this->_registry = $registry;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        // Something is calling customer save twice, which is triggering an error on the api because the customer already exist on ERPM.
        // So we are adding this registry here as a safe
        if($this->_registry->registry('erpm_person_called')){
            return $this;
        }
        /** @var \Magento\Customer\Model\Customer $customer */
        $customer = $observer->getData('customer');
        $email = $this->_request->getParam('email', false);
        $password = $this->_request->getParam('password', false);
        $countryCode = $this->_request->getParam('erpm_country', false);

        if($email && $password){
            $this->_person->registerCustomer($customer, $email, $password,$countryCode);
            $this->_registry->register('erpm_person_called',1);
        }
    }
}