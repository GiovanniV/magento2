<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Matisse Laurel
 *
 */

namespace Born\Newsletters\Block\Newsletter\Adminhtml\Template\Grid\Renderer;
use Magento\Framework\DataObject;
class Frequency extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    public function render(\Magento\Framework\DataObject $row)
    {
        if($row->getData('type')==1){
            return ($row->getData('frequency')!=''?$row->getData('frequency'):'----');
        }else{
            return ($row->getData('firstname')!=''?$row->getData('firstname'):'----');
        }
    }
}