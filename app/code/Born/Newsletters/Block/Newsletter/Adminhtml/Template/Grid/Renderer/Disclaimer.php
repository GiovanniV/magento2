<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Matisse Laurel
 *
 */

namespace Born\Newsletters\Block\Newsletter\Adminhtml\Template\Grid\Renderer;
use Magento\Framework\DataObject;
class Disclaimer extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    public function render(\Magento\Framework\DataObject $row)
    {
        if($row->getData('type')==1){
            return ($row->getData('disclaimer_agreed')!=''?$row->getData('disclaimer_agreed'):'----');
        }else{
            return ($row->getData('lastname')!=''?$row->getData('lastname'):'----');
        }
    }
}