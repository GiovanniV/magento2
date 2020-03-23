<?php
namespace Born\DealerSearchApi\Controller\Index;

use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\Action\Context;
use Born\DealerSearchApi\Block\Stores;

/**
 * Class CheckPinCode
 * @package Born\DealerSearchApi\Controller\Index
 */
class CheckPinCode extends \Magento\Framework\App\Action\Action
{
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;
    /**
     * @var Stores
     */
    protected $blockInstance;

    /**
     * CheckPinCode constructor.
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param Stores $stored
     */
    public function __construct(Context $context, JsonFactory $resultJsonFactory, Stores $stored)
    {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->blockInstance = $stored;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $status=0;
        if ($this->getRequest()->isAjax()) {
            $data = $this->getRequest()->getParams();
            return $result->setData(array('status'=>$this->blockInstance->checkcountry($data['countryid'])));
        }
    }
}
