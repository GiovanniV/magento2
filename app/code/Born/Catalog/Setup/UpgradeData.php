<?php
/**
 * Born_Catalog UpgradeData
 * @category  PHP
 * @package   Born\Catalog
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 *
 */
namespace Born\Catalog\Setup;

use Magento\Catalog\Api\CategoryListInterface;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Api\Data\CategoryInterfaceFactory;
use Magento\Catalog\Model\Product;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\File\Csv;
use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\Registry;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\ProductAlert\Model\Observer;
use Magento\Framework\App\State;
use Magento\Framework\App\Area;

/**
 * Class UpgradeData
 * @package Born\Catalog\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     *
     */
    const ATTRIBUTE_SEARCH_OPTION = 'is_searchable';

    /**
     *
     */
    const ALERT_STATUS = 1;
    /**
     * @var EavSetupFactory
     */
    protected $eavSetupFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;
    /**
     * @var \Magento\Eav\Api\AttributeRepositoryInterface
     */
    protected $attributeRepository;

    /**
     * @var Magento\Framework\App\Config\ConfigResource\ConfigInterface
     */
    protected $resourceConfig;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var CategoryInterfaceFactory
     */
    protected $categoryInterfaceFactory;

    /**
     * @var CategoryListInterface
     */
    protected $categoryList;

    /**
     * @var Reader
     */
    private $moduleDirReader;

    /**
     * @var Csv
     */
    private $csvProcessor;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var \Magento\Framework\App\ObjectManager
     */
    private $objectManager;

    /**
     * @var State
     */
    private $state;

    /**
     * UpgradeData constructor.
     * @param EavSetupFactory $eavSetupFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param AttributeRepositoryInterface $attributeRepository
     * @param ConfigInterface $resourceConfig
     * @param CategoryRepositoryInterface $categoryRepository
     * @param CategoryInterfaceFactory $categoryInterfaceFactory
     * @param CategoryListInterface $categoryList
     * @param Csv $csvProcessor
     * @param Reader $moduleDirReader
     * @param Registry $registry
     * @param State $state
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        AttributeRepositoryInterface $attributeRepository,
        ConfigInterface $resourceConfig,
        CategoryRepositoryInterface $categoryRepository,
        CategoryInterfaceFactory $categoryInterfaceFactory,
        CategoryListInterface $categoryList,
        Csv $csvProcessor,
        Reader $moduleDirReader,
        Registry $registry,
        State $state
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->attributeRepository = $attributeRepository;
        $this->resourceConfig = $resourceConfig;
        $this->categoryRepository = $categoryRepository;
        $this->categoryInterfaceFactory = $categoryInterfaceFactory;
        $this->categoryList = $categoryList;
        $this->csvProcessor = $csvProcessor;
        $this->moduleDirReader = $moduleDirReader;
        $this->registry = $registry;
        $this->state = $state;
        $this->objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        /**Set use in search value to No for all product attribute except sku and product name*/
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $entityType = $eavSetup->getEntityTypeId(\Magento\Catalog\Api\Data\ProductAttributeInterface::ENTITY_TYPE_CODE);

            $searchCriteria = $this->searchCriteriaBuilder->addFilter('attribute_code', 'sku', 'neq')->addFilter('attribute_code', 'name', 'neq')->create();
            $attributeRepository = $this->attributeRepository->getList(
                \Magento\Catalog\Api\Data\ProductAttributeInterface::ENTITY_TYPE_CODE,
                $searchCriteria
            );
            foreach ($attributeRepository->getItems() as $items) {
                $eavSetup->updateAttribute($entityType, $items->getAttributeCode(), self::ATTRIBUTE_SEARCH_OPTION, '0');
            }
        }
        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $eavSetup->addAttribute(
                Product::ENTITY,
                'walmart_url',
                [
                    'type' => 'text',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Walmart Url',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => false,
                    'unique' => false,
                    'apply_to' => ''
                ]
            );
            $eavSetup->addAttribute(
                Product::ENTITY,
                'product_bullets',
                [
                    'type' => 'text',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Product Bullets',
                    'input' => 'textarea',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'wysiwyg_enabled'   => true,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => false,
                    'unique' => false,
                    'apply_to' => ''
                ]
            );
            /*Create Attribute Group and Add Attributes to group & attribute sets*/
            $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
            $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
            $groupName="K&N Attributes";
            $searchAttributeCodes=['walmart_url','product_bullets'];

            foreach ($attributeSetIds as $attributeSetId) {
                $eavSetup->addAttributeGroup($entityTypeId, $attributeSetId, $groupName, 19);
                $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
                foreach ($searchAttributeCodes as $searchAttributeCode) {
                    $eavSetup->addAttributeToGroup(
                        $entityTypeId,
                        $attributeSetId,
                        $attributeGroupId,
                        $searchAttributeCode,
                        null
                    );
                }
            }
        }
        if (version_compare($context->getVersion(), '1.0.3', '<')) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $attributes = [
                'walmart_url',
                'product_bullets'
            ];
            foreach ($attributes as $attribute) {
                $eavSetup->updateAttribute(
                    Product::ENTITY,
                    $attribute,
                    'is_global',
                    ScopedAttributeInterface::SCOPE_STORE
                );
            }
        }
        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            /* Assign Attributes to group & attribute sets*/
            $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
            $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
            $groupName="K&N Attributes";
            foreach ($attributeSetIds as $attributeSetId) {
                $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
                $attributeGroupId_rem = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, 'attributes');
                $eavSetup->addAttributeToGroup($entityTypeId, $attributeSetId, $attributeGroupId, 'available_information', null);
                $eavSetup->removeAttributeGroup($entityTypeId, $attributeSetId, $attributeGroupId_rem);
            }
            $eavSetup->removeAttribute(Product::ENTITY, 'engine_size');
        }
        if (version_compare($context->getVersion(), '1.0.5', '<')) {
            $this->createAttributes($setup);
        }

        if (version_compare($context->getVersion(), '1.0.6', '<')) {
            $this->createAttributeProp($setup);
        }

        if (version_compare($context->getVersion(), '1.0.7', '<')) {
            $this->createAttributeAerosol($setup);
        }

        if (version_compare($context->getVersion(), '1.0.8', '<')) {
            $this->createFilterAttributes($setup);
        }

        if (version_compare($context->getVersion(), '1.0.9', '<')) {
            $this->setProductAlert($setup);
        }
        if (version_compare($context->getVersion(), '1.0.10', '<')) {
            $this->createEducationalToolTipsAttribute($setup);
        }

        if (version_compare($context->getVersion(), '1.0.11', '<')) {
            $this->updateCategories($setup);
        }
        $setup->endSetup();
    }

    /**
     * @param ModuleDataSetupInterface $setup
     */
    private function createAttributes(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'carb_eo_number',
            [
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'CARB EO number',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'pdf',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'PDF Links',
                'input' => 'textarea',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'wysiwyg_enabled'   => false,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'partsvia',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Available for PartsVia',
                'input' => 'boolean',
                'class' => '',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '0',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'carb_status',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'CARB',
                'input' => 'boolean',
                'class' => '',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '0',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        /*Create Attribute Group and Add Attributes to group & attribute sets*/
        $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
        $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
        $groupName="K&N Attributes";
        $searchAttributeCodes=['carb_status','carb_eo_number','partsvia','pdf'];

        foreach ($attributeSetIds as $attributeSetId) {
            $eavSetup->addAttributeGroup($entityTypeId, $attributeSetId, $groupName, 19);
            $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
            foreach ($searchAttributeCodes as $searchAttributeCode) {
                $eavSetup->addAttributeToGroup(
                    $entityTypeId,
                    $attributeSetId,
                    $attributeGroupId,
                    $searchAttributeCode,
                    null
                );
            }
        }
    }

    /**
     * @param ModuleDataSetupInterface $setup
     */
    private function createAttributeProp(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'prop65',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Proposition 65',
                'input' => 'boolean',
                'class' => '',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '0',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        /*Create Attribute Group and Add Attributes to group & attribute sets*/
        $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
        $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
        $groupName="K&N Attributes";
        $searchAttributeCodes=['prop65'];

        foreach ($attributeSetIds as $attributeSetId) {
            $eavSetup->addAttributeGroup($entityTypeId, $attributeSetId, $groupName, 19);
            $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
            foreach ($searchAttributeCodes as $searchAttributeCode) {
                $eavSetup->addAttributeToGroup(
                    $entityTypeId,
                    $attributeSetId,
                    $attributeGroupId,
                    $searchAttributeCode,
                    null
                );
            }
        }
    }

    /**
     * @param ModuleDataSetupInterface $setup
     */
    private function createAttributeAerosol(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'aerosol',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Is Aerosol',
                'input' => 'boolean',
                'class' => '',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '0',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        /*Create Attribute Group and Add Attributes to group & attribute sets*/
        $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
        $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
        $groupName="K&N Attributes";
        $searchAttributeCodes=['aerosol'];

        foreach ($attributeSetIds as $attributeSetId) {
            $eavSetup->addAttributeGroup($entityTypeId, $attributeSetId, $groupName, 19);
            $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
            foreach ($searchAttributeCodes as $searchAttributeCode) {
                $eavSetup->addAttributeToGroup(
                    $entityTypeId,
                    $attributeSetId,
                    $attributeGroupId,
                    $searchAttributeCode,
                    null
                );
            }
        }
    }

    /**
     * @param ModuleDataSetupInterface $setup
     */
    private function createFilterAttributes(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'is_reusable',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Is Reusable',
                'input' => 'select',
                'class' => '',
                'source' => \Born\Catalog\Model\Source\YesNo::class,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '0',
                'searchable' => false,
                'filterable' => 2,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => 1,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'is_new_release',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Is New Release',
                'input' => 'select',
                'class' => '',
                'source' => \Born\Catalog\Model\Source\YesNo::class,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '0',
                'searchable' => false,
                'filterable' => 2,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => 1,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        /*Create Attribute Group and Add Attributes to group & attribute sets*/
        $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
        $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
        $groupName="K&N Attributes";
        $searchAttributeCodes=['is_reusable', 'is_new_release'];

        foreach ($attributeSetIds as $attributeSetId) {
            $eavSetup->addAttributeGroup($entityTypeId, $attributeSetId, $groupName, 19);
            $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
            foreach ($searchAttributeCodes as $searchAttributeCode) {
                $eavSetup->addAttributeToGroup(
                    $entityTypeId,
                    $attributeSetId,
                    $attributeGroupId,
                    $searchAttributeCode,
                    null
                );
            }
        }

        $eavSetup->updateAttribute(
            Product::ENTITY,
            'quantity_and_stock_status',
            'filterable',
            2
        );

        $eavSetup->updateAttribute(
            Product::ENTITY,
            'quantity_and_stock_status',
            'label',
            'Status'
        );
    }

    /**
     * @param ModuleDataSetupInterface $setup
     */
    private function setProductAlert(ModuleDataSetupInterface $setup)
    {
        $this->resourceConfig->saveConfig(
            Observer::XML_PATH_PRICE_ALLOW,
            self::ALERT_STATUS
        );

        $this->resourceConfig->saveConfig(
            Observer::XML_PATH_STOCK_ALLOW,
            self::ALERT_STATUS
        );
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function createEducationalToolTipsAttribute(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'educational_tool_tips',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Educational Tool Tips',
                'input' => 'textarea',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'wysiwyg_enabled'   => true,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        /*Create Attribute Group and Add Attributes to group & attribute sets*/
        $entityTypeId = $eavSetup->getEntityTypeId(Product::ENTITY);
        $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
        $groupName="K&N Attributes";
        $searchAttributeCodes=['educational_tool_tips'];

        foreach ($attributeSetIds as $attributeSetId) {
            $eavSetup->addAttributeGroup($entityTypeId, $attributeSetId, $groupName, 19);
            $attributeGroupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $groupName);
            foreach ($searchAttributeCodes as $searchAttributeCode) {
                $eavSetup->addAttributeToGroup(
                    $entityTypeId,
                    $attributeSetId,
                    $attributeGroupId,
                    $searchAttributeCode,
                    null
                );
            }
        }
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @throws LocalizedException
     */
    private function updateCategories(ModuleDataSetupInterface $setup)
    {
        if (!$this->registry->registry('isSecureArea')) {
            $this->registry->register('isSecureArea', true);
        }

        $categoryFactory = $this->objectManager->get('Magento\Catalog\Model\CategoryFactory');
        $newCategory = $categoryFactory->create();
        $collection = $newCategory->getCollection();
        foreach ($collection as $category) {
            if ($category->getId() > 2) {
                $category->delete();
            }
        }

        $tableName = $setup->getTable('catalog_url_rewrite_product_category');
        $setup->getConnection()->truncateTable($tableName);

        $filePath = $this->moduleDirReader->getModuleDir('', 'Born_Catalog')
            . '/Setup/import/categories.csv';

        try {
            $csvData = $this->csvProcessor->getData($filePath);
        } catch (\Exception $e) {
            throw new LocalizedException(
                __($e->getMessage())
            );
        }

        $createdCategories = [];
        foreach ($csvData as $rowIndex => $dataRow) {
            if ($rowIndex > 0) {
                if (!isset($createdCategories[$dataRow[0]])) {
                    $category1 = $this->createCategory($dataRow[0]);
                    $createdCategories[$dataRow[0]] = ['id' =>$category1->getId(), 'level' => $category1->getLevel()];
                }

                $level1 = $createdCategories[$dataRow[0]]['level'];
                $id1 = $createdCategories[$dataRow[0]]['id'];
                $name1 = $dataRow[0];

                if (isset($dataRow[1]) && $dataRow[1]) {
                    if (!isset($createdCategories[$dataRow[1]])) {
                        $category2 = $this->createCategory($dataRow[1], $id1, $level1);
                        $createdCategories[$dataRow[1]] = ['id' =>$category2->getId(), 'level' => $category2->getLevel(),'parent_name'=>$name1];
                    } else {
                        if (isset($createdCategories[$dataRow[1]]['parent_name']) && $createdCategories[$dataRow[1]]['parent_name']!=$name1) {
                            $category2 = $this->createCategory($dataRow[1], $id1, $level1);
                            $createdCategories[$dataRow[1]] = ['id' =>$category2->getId(), 'level' => $category2->getLevel(),'parent_name'=>$name1];
                        }
                    }
                    $level2 = $createdCategories[$dataRow[1]]['level'];
                    $id2 = $createdCategories[$dataRow[1]]['id'];
                }
                if (isset($dataRow[2]) && $dataRow[2]) {
                    $category3 = $this->createCategory($dataRow[2], $id2, $level2);
                }
            }
        }

        $self = $this;

        try {
            $this->state->emulateAreaCode(Area::AREA_ADMINHTML, function () use ($self) {
                $productFactory = $self->objectManager->get('Magento\Catalog\Model\ProductFactory');
                $newProduct = $productFactory->create();
                $collection = $newProduct->getCollection();
                foreach ($collection as $product) {
                    $product->delete();
                }
            });
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @param $name
     * @param int $parentId
     * @param int $level
     * @return \Magento\Catalog\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    private function createCategory($name, $parentId=2, $level=1)
    {
        $level = $level+1;
        /* @var \Magento\Catalog\Api\Data\CategoryInterface $category*/
        $category = $this->categoryInterfaceFactory->create();
        $category->setName($name);
        $category->setIsActive(1);
        $category->setIncludeInMenu(0);
        $category->setParentId($parentId);
        $category->setLevel($level);
        $category->setCustomAttribute('is_anchor', 1);
        return $this->categoryRepository->save($category);
    }
}
