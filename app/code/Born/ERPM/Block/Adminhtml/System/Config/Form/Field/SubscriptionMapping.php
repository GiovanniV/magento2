<?php


namespace Born\ERPM\Block\Adminhtml\System\Config\Form\Field;

class SubscriptionMapping extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
    protected $_template = 'Born_ERPM::system/config/form/field/array.phtml';

    protected function _construct()
    {
        parent::_construct();
        $this->addColumn('SubscriptionCode', ['label' => __('Subscription Code')]);
        $this->addColumn('SubscriptionName', ['label' => __('Subscription Name')]);
        $this->_addAfter = false;

    }

    public function renderCellTemplate($columnName)
    {
        if ($columnName != "order") {
            return parent::renderCellTemplate($columnName);
        } else {
            $inputName = $this->_getCellInputElementName($columnName);
            $html = '<input type="text" name="' . $inputName . '" id="' . $this->_getCellInputElementId('<%- _id %>', $columnName) . '"/>';
            return $html;
        }
    }
}
