<?php
/**
 * Born_Cleanup InstallData
 *
 */
 namespace Born\Cleanup\Setup;
 use Magento\Eav\Setup\EavSetup;
 use Magento\Eav\Setup\EavSetupFactory;
 use Magento\Framework\Setup\InstallDataInterface;
 use Magento\Framework\Setup\ModuleContextInterface;
 use Magento\Framework\Setup\ModuleDataSetupInterface;
 use Magento\Catalog\Model\Product;
 use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
 use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory as productAttributeCollection;
 /**
  * Class InstallData
  * @package Born\Cleanup\Setup
  */
 class InstallData implements InstallDataInterface
 {
     /**
      * @var EavSetupFactory
      */
     private $eavSetupFactory;
     /**
      * @var CollectionFactory
      */
     protected $productAttributeCollection;
     /**
      * @var Attribute
      */
     protected $attributeFactory;

     /**
      * InstallData constructor.
      * @param EavSetupFactory $eavSetupFactory
      * @param Attribute $attributeFactory
      */
     public function __construct(EavSetupFactory $eavSetupFactory, Attribute $attributeFactory,productAttributeCollection $productAttributeCollection)
	{
	 $this->eavSetupFactory = $eavSetupFactory;
	 $this->attributeFactory = $attributeFactory;
	 $this->productAttributeCollection = $productAttributeCollection;
	 }

     /**
      * @param ModuleDataSetupInterface $setup
      * @param ModuleContextInterface $context
      */
     public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	 {
	 $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
	 $attributeInfo = $this->productAttributeCollection->create()
				->setAttributeGroupFilter(22)
				->addVisibleFilter()
				->load(); // product attribute collection
	   
		foreach($attributeInfo as $attributes)    {
			if($attributes->getAttributeCode()!='available_information'){
			$eavSetup->removeAttribute(Product::ENTITY, $attributes->getAttributeCode());
			}
		}
	 }
	 }