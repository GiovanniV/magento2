<?php


namespace Born\AdobeAnalytics\Block\Adminhtml\System\Config\Form\Field;

class LocaleMapping extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
    protected $_template = 'Born_AdobeAnalytics::system/config/form/field/array.phtml';

    protected function _construct()
    {
        parent::_construct();
        $this->addColumn('locale', ['label' => __('Magento Locale')]);
        $this->addColumn('cd2', ['label' => __('Local Code (cd2)')]);
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
