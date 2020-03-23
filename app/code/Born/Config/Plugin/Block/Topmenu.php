<?php

namespace Born\Config\Plugin\Block;

use Born\Config\Helper\Data as Helper;

use Magento\Framework\Data\Tree\NodeFactory;


/**
 * Class Topmenu
 * @package Born\Config\Plugin\Block
 */
class Topmenu
{
    /**
     * @var NodeFactory
     */
    protected $nodeFactory;

    /**
     * @var
     */
    protected $helper;

    /**
     * Topmenu constructor.
     * @param NodeFactory $nodeFactory
     * @param Helper $helper
     */
    public function __construct(
        NodeFactory $nodeFactory,
        Helper $helper
    ) {
        $this->nodeFactory = $nodeFactory;
        $this->_helper = $helper;
    }

    /**
     * @param \Magento\Theme\Block\Html\Topmenu $subject
     * @param string $outermostClass
     * @param string $childrenWrapClass
     * @param int $limit
     * @return array
     */
    public function beforeGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject,
        $outermostClass = '',
        $childrenWrapClass = '',
        $limit = 0
    ) {
        if($this->_helper->getSupportUrl()){
            $node = $this->nodeFactory->create(
                [
                    'data' => $this->getNodeAsArray(),
                    'idField' => 'id',
                    'tree' => $subject->getMenu()->getTree()
                ]
            );
            $subject->getMenu()->addChild($node);
        }
        return [$outermostClass,$childrenWrapClass,$limit];
    }

    /**
     * @return array
     */
    protected function getNodeAsArray()
    {
        return [
            'name' => __('Support'),
            'id' => 'support-link-id',
            'url' => $this->_helper->getSupportUrl(),
            'has_active' => false,
            'is_active' => false
        ];
    }
}