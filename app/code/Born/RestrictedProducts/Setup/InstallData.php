<?php
 /**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\RestrictedProducts\Setup;

use Magento\Catalog\Model\Product;
 use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
 use Magento\Eav\Model\Entity\Attribute\SetFactory;
 use Magento\Eav\Setup\EavSetupFactory;
 use Magento\Framework\Setup\InstallDataInterface;
 use Magento\Framework\Setup\ModuleContextInterface;
 use Magento\Framework\Setup\ModuleDataSetupInterface;

 /**
  * Class InstallData
  * @package Born\RestrictedProducts\Setup
  */
 class InstallData implements InstallDataInterface
 {
     /**
      * EAV setup factory
      *
      * @var \Magento\Eav\Setup\EavSetupFactory
      */
     private $eavSetupFactory;

     /**
      * Attribute set factory
      *
      * @var SetFactory
      */
     private $attributeSetFactory;

     /**
      * Constructor
      *
      * @param EavSetupFactory $eavSetupFactory
      * @param SetFactory $attributeSetFactory
      */
     public function __construct(
        EavSetupFactory $eavSetupFactory,
        SetFactory $attributeSetFactory
    ) {
         $this->eavSetupFactory = $eavSetupFactory;
         $this->attributeSetFactory = $attributeSetFactory;
     }

     /**
      * {@inheritdoc}
      */
     public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
     {
         $setup->startSetup();
         $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

         $eavSetup->addAttribute(
                Product::ENTITY,
                'ship_to_countries_regions',   // product attribute code
                [
                    'type' => 'text', // datatype of the attribute
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'ship to countries', // label of the attribute
                    'input' => 'textarea',  // form element of the attribute
                    'class' => '',
                    'source' => '', // define the source of the attribute (for select and multiselect attribute input type)
                    'global' =>Attribute::SCOPE_GLOBAL, // scope of the attribute (global, store, website)
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => 0,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => false,
                    'unique' => false,
                    'apply_to' => ''
                ]
            );
         $groupName = 'attributes'; /* Label of your group*/
         $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY); /* get entity type id so that attribute are only assigned to catalog_product */
         $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId); /* Here we have fetched all attribute set as we want attribute group to show under all attribute set.*/

         foreach ($attributeSetIds as $attributeSetId) {
             $eavSetup->addAttributeGroup($entityTypeId, $attributeSetId, $groupName, 19);
             $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
             // Add existing attribute to group
             $attributeId = $eavSetup->getAttributeId($entityTypeId, 'ship_to_countries_regions');
             $eavSetup->addAttributeToGroup($entityTypeId, $attributeSetId, $attributeGroupId, $attributeId, null);
         }

         $setup->endSetup();
     }
 }
