<?php

namespace Born\Navigation\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Catalog\Model\ResourceModel\Category\TreeFactory;
use Magento\Store\Model\StoreManagerInterface as StoreManager;
use Magento\Catalog\Model\CategoryRepository as categoryRepository;
use Magento\Eav\Setup\EavSetupFactory;


/**
 * Class UpgradeData
 * @package Born\Navigation\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var CategoryFactory
     */
    protected $_categoryFactory;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var TreeFactory
     */
    protected $_treeFactory;

    /**
     * @var StoreManager
     */
    protected $_storeManager;

    /**
     * @var categoryRepository
     */
    protected $_categoryRepository;

    /**
     * @var \Magento\Framework\Data\Tree\Node
     */
    protected $categoryTree;

    protected $eavSetupFactory;

    /**
     * UpgradeData constructor.
     * @param CategoryFactory $categoryFactory
     * @param CollectionFactory $collectionFactory
     * @param TreeFactory $treeFactory
     * @param StoreManager $storeManager
     * @param categoryRepository $categoryRepository
     */
    public function __construct(
        CategoryFactory $categoryFactory,
        CollectionFactory $collectionFactory,
        TreeFactory $treeFactory,
        StoreManager $storeManager,
        categoryRepository $categoryRepository,
        EavSetupFactory $eavSetupFactory
    )
    {

        $this->_categoryFactory = $categoryFactory;
        $this->_treeFactory = $treeFactory;
        $this->_storeManager = $storeManager;
        $this->_categoryRepository = $categoryRepository;
        $this->_collectionFactory = $collectionFactory;
        $this->eavSetupFactory = $eavSetupFactory;

    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        if ($context->getVersion()
            && version_compare($context->getVersion(), '2.0.2') < 0
        ){

            $setup->startSetup();

            $mainCategories = ["Products", "Developers", "Use Cases", "Support"];

            foreach($mainCategories as $mainCategory)
            {
                $this->create($mainCategory, 'Default Category');
            }
            $setup->endSetup();
        }

        if ($context->getVersion()
            && version_compare($context->getVersion(), '2.0.3') < 0
        ){
            $setup->startSetup();
            $subCategories = [
                "Products" => [
                    "Stereo Depth", "Coded Light", "Tracking", "Software"
                ],
                "Developers" => [
                    "Get Started", "Documentation", "Community", "Webinars & Events"
                ],
                "Use Cases" => [
                    "Retail", "Robotics", "3D Scanning", "More Use Cases"
                ],
                "Support" => [
                    "Store Support", "Product Support"
                ]
            ];
            foreach($subCategories as $parent => $childrens)
            {
                foreach($childrens as $category)
                {
                    $this->create($category,$parent);
                }
            }
            $setup->endSetup();
        }

        if ($context->getVersion()
            && version_compare($context->getVersion(), '2.0.4') < 0
        ){
            // Category creations based on TCS-1 ticket
            $setup->startSetup();
            $subsubCategories = [
                "Stereo Depth" => ["D415 Depth Camera","D415 Depth Camera","D415 Depth Camera"],
                "Coded Light" => ["SR300 Module"],
                "Tracking" => ["TM2 Camera"],
                "Software" => ["Program-1", "Software for Intel RealSense"],
                "Get Started" => ["Videos & Tutorials", "FAQs"],
                "Documentation" => ["SDK 2.0","White Papers","Downloads"],
                "Community" => ["Discussions"],
                "Webinars & Events" => ["Upcoming Events","Past Webinar Replays","Subscribe for Updates"],
                "Retail" => ["Amazon","Youspace"],
                "Robotics" => ["Looma","Zenbo"],
                "3D Scanning" => ["Naked Labs"],
                "More Use Cases" => ["Drones","Face Authorization & Gesture Tracking", "VR"],
                "Store Support" => ["Contact Customer support","Track Your Order","Store Policies", "Product Returns", "Leave Feedback"],
                "Product Support" => ["Register Your Product","Warranty Information","Help Center","Regulatory Information"]
            ];

            foreach($subsubCategories as $parent => $childrens)
            {
                foreach($childrens as $category)
                {
                    $this->create($category,$parent);
                }
            }
            $setup->endSetup();
        }

        if($context->getVersion() && version_compare($context->getVersion(), '2.0.5') < 0) {


            $setup->startSetup();
            /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_link_text',
                [
                    'type' => 'varchar',
                    'input' => 'text',
                    'label' => 'Category Link text',
                    'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                    'required' => false,
                    'sort_order' => 30,
                    'group' => 'Navigation Settings'
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_link',
                [
                    'type' => 'varchar',
                    'input' => 'text',
                    'label' => 'Category Link',
                    'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                    'required' => false,
                    'sort_order' => 40,
                    'group' => 'Navigation Settings'
                ]
            );

            $setup->endSetup();
        }
    }

    /**
     * Get category name by path
     *
     * @param string $path
     * @return \Magento\Framework\Data\Tree\Node
     */
    protected function getCategoryByPath($path)
    {
        $names = array_filter(explode('/', $path));
        $tree = $this->getTree();
        foreach ($names as $name) {
            $tree = $this->findTreeChild($tree, $name);
            if (!$tree) {
                break;
            }
        }

        return $tree;
    }

    /**
     * Get category tree
     *
     * @param int|null $rootNode
     * @param bool $reload
     * @return \Magento\Framework\Data\Tree\Node
     */
    protected function getTree($rootNode = null, $reload = false)
    {
        if (!$this->categoryTree || $reload) {
            if ($rootNode === null) {
                $rootNode = $this->_storeManager->getDefaultStoreView()->getRootCategoryId();
            }
            /** @var \Magento\Catalog\Model\ResourceModel\Category\Tree $tree */
            $tree = $this->_treeFactory->create();
            $node = $tree->loadNode($rootNode)->loadChildren();

            $tree->addCollectionData(null, false, $rootNode);

            $this->categoryTree = $node;
        }
        return $this->categoryTree;
    }

    /**
     * Get child categories
     *
     * @param \Magento\Framework\Data\Tree\Node $tree
     * @param string $name
     * @return mixed
     */
    protected function findTreeChild($tree, $name)
    {
        $foundChild = null;
        if ($name) {
            foreach ($tree->getChildren() as $child) {
                if ($child->getName() == $name) {
                    $foundChild = $child;
                    break;
                }
            }
        }
        return $foundChild;
    }

    /**
     * Create new category
     * @param $categories string
     * @param $parent_category_path string
     * @return void
     */
    public function create($newCategory, $parent_category_path = '')
    {
        $categoryModel = $this->getCategoryByName($newCategory);

        if (!$categoryModel->getId()) {

            $parentCategory = $this->getCategoryByName($parent_category_path);
            $data = $this->prepareData($newCategory);
            $data['parent_id'] = $parentCategory->getId();
            $category = $this->_categoryFactory->create();
            $category->setData($data)
                ->setAttributeSetId($category->getDefaultAttributeSetId());

            $this->_categoryRepository->save($category);

        }
    }

    /**
     * @param $categoryName
     * @return \Magento\Framework\DataObject
     */
    public function getCategoryByName($categoryName)
    {
        /** @var \Magento\Catalog\Model\ResourceModel\Category\Collection $collectionModel */
        $collectionModel = $this->_collectionFactory->create();
        $collectionModel->addAttributeToFilter('name', $categoryName);
        $category = $collectionModel->getFirstItem();
        return $category;

    }

    /**
     * Prepare category data
     *
     * @param $name
     * @param $displayMode
     * @param $pageLayout
     * @return array
     */
    protected function prepareData($name, $displayMode="PRODUCTS", $pageLayout="2columns-left")
    {
        // Clean name to be used as url key
        $urlKey = preg_replace('/\s+/', '_', strtolower($name));
        $urlKey = str_replace(array('\'', '"'), '', $urlKey);
        $data = [
            'name' => $name,
            'is_active' => true,
            'is_anchor' => true,
            'include_in_menu' => true,
            'url_key' => $urlKey,
            'display_mode' => $displayMode,
            'page_layout' => $pageLayout,
        ];

        return $data;
    }
}