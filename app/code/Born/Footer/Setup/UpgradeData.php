<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * @author Kai Kang
 */

namespace Born\Footer\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Cms\Api\Data\BlockInterfaceFactory;
use Magento\Cms\Api\BlockRepositoryInterface;

/**
 * Class UpgradeData
 *
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var ResourceConfig
     */
    protected $resourceConfig;
    /**
     * @var BlockInterfaceFactory
     */
    protected $blockInterfaceFactory;
    /**
     * @var BlockRepositoryInterface
     */
    protected $blockRepository;
    /**
     * UpgradeData constructor.
     * @param ResourceConfig $resourceConfig
     */
    public function __construct(
        ResourceConfig $resourceConfig,
        BlockRepositoryInterface $blockRepository,
        BlockInterfaceFactory $blockInterfaceFactory

    ) {
        $this->resourceConfig = $resourceConfig;
        $this->blockInterfaceFactory = $blockInterfaceFactory;
        $this->blockRepository = $blockRepository;
    }


    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        /*
         *  Update copyright -> Start
         */
        if(version_compare($context->getVersion(),'0.0.2') < 0) {
            $this->changeCopyright();
        }
        /*
         *  Update CMS Block -> Start
         */
        if(version_compare($context->getVersion(),'0.0.4') < 0) {
            $this->createCMSPage();
        }

        $setup->endSetup();
    }

    private function changeCopyright(){
        $this->resourceConfig->saveConfig(
            'design/footer/copyright',
            'Copyright © 2018 K&N Engineering, Inc. All Rights Reserved.',
            'default',
            0
        );
    }
    private function createCMSPage(){
        $footer_connectknn = [
            'title' => 'footer_connectknn',
            'identifier' => 'footer_connectknn',
            'content' => '<div>
                                    <h2>CONNECT WITH K&N</h2>
                                    <a href="email">Email</a><br>
                                    <a href="Facebook">Facebook</a><br>
                                    <a href="Twitter">Twitter</a><br>
                                    <a href="Youtube">Youtube</a><br>
                                    <a href="Instagram">Instagram</a><br>
                                    <a href="Pinterest">Pinterest</a><br>
                                </div>',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $footer_support = [
            'title' => 'footer_support',
            'identifier' => 'footer_support',
            'content' => '<div>
                                <h2>SUPPORT</h2>
                                <a href="contact_customer_service">Contact Customer Service</a><br>
                                <a href="order_status">Order Status</a><br>
                                <a href="warranty_registration">Warranty & registration</a><br>
                                <a href="shipping_return">Shipping & return</a><br>
                                <a href="faqs">FAQs</a><br>
                                <a href="installation_video">Installation video</a><br>
                                <a href="contingency_racing">Contingency racing</a><br>
                                <a href="become_dealer">Become a dealer</a><br>
                            </div>',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $footer_abountknn = [
            'title' => 'footer_abountknn',
            'identifier' => 'footer_abountknn',
            'content' => '<div>
                                <h2>ABOUT K&N</h2>
                                <a href="about_knn">About K&N</a><br>
                                <a href="knn_history">K&N history</a><br>
                                <a href="events">events</a><br>
                                <a href="testimonials">testimonials</a><br>
                                <a href="product_testing">product testing</a><br>
                                <a href="careers">careers</a><br>
                                <a href="blog">blog</a><br>
                              </div>',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $footer_products = [
            'title' => 'footer_products',
            'identifier' => 'footer_products',
            'content' => '<div>
                                <h2>PRODUCTS</h2>
                                <a href="contact_customer_service">Air filters</a><br>
                                <a href="order_status">Air intakes</a><br>
                                <a href="warranty_registration">Oil filters</a><br>
                                <a href="shipping_return">Cabin air filters</a><br>
                                <a href="faqs">Performance parts</a><br>
                                <a href="installation_video">K&N gear</a><br>
                                <a href="contingency_racing">New products</a><br>
                              </div>',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $footer_additionalsearches = [
            'title' => 'footer_additionalsearches',
            'identifier' => 'footer_additionalsearches',
            'content' => '<div>
                                <h2>ADDITIONAL SEARCHERS</h2>
                                <a href="contact_customer_service">Air filters by vm</a><br>
                                <a href="order_status">Air intakes by vm</a><br>
                                <a href="warranty_registration">Oil filters by vm</a><br>
                                <a href="shipping_return">Cross reference by vm</a><br>
                              </div>',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $block_connectknn = $this->blockInterfaceFactory->create()->setData($footer_connectknn);
        $this->blockRepository->save($block_connectknn);

        $block_support = $this->blockInterfaceFactory->create()->setData($footer_support);
        $this->blockRepository->save($block_support);

        $block_abountknn = $this->blockInterfaceFactory->create()->setData($footer_abountknn);
        $this->blockRepository->save($block_abountknn);

        $block_products = $this->blockInterfaceFactory->create()->setData($footer_products);
        $this->blockRepository->save($block_products);

        $block_additionalsearches = $this->blockInterfaceFactory->create()->setData($footer_additionalsearches);
        $this->blockRepository->save($block_additionalsearches);

    }

}