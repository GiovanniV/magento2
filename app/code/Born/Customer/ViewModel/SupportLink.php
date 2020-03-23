<?php
namespace Born\Customer\ViewModel;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class Title
 * @package Born\Customer\ViewModel
 */
class SupportLink extends DataObject implements ArgumentInterface
{
    protected $_helper;

    public function __construct(
        \Born\Config\Helper\Data $helper,
        array $data = []
    ) {
        $this->_helper = $helper;
        parent::__construct($data);
    }

    public function getSupportUrl()
    {
        return $this->_helper->getSupportUrl();
    }

    public function getNewsletterText()
    {
        return $this->_helper->getNewsletterText();
    }

    public function getRegisterTermsAndCondition()
    {
        return $this->_helper->getRegisterTermsAndCondition();
    }
}
