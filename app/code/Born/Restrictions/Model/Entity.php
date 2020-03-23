<?php


namespace Born\Restrictions\Model;

use Born\Restrictions\Api\Data\EntityInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Born\Restrictions\Api\Data\EntityInterface;

class Entity extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $entityDataFactory;

    protected $_eventPrefix = 'born_restrictions_entity';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param EntityInterfaceFactory $entityDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\Restrictions\Model\ResourceModel\Entity $resource
     * @param \Born\Restrictions\Model\ResourceModel\Entity\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        EntityInterfaceFactory $entityDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Born\Restrictions\Model\ResourceModel\Entity $resource,
        \Born\Restrictions\Model\ResourceModel\Entity\Collection $resourceCollection,
        array $data = []
    ) {
        $this->entityDataFactory = $entityDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve entity model with entity data
     * @return EntityInterface
     */
    public function getDataModel()
    {
        $entityData = $this->getData();
        
        $entityDataObject = $this->entityDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $entityDataObject,
            $entityData,
            EntityInterface::class
        );
        
        return $entityDataObject;
    }
}
