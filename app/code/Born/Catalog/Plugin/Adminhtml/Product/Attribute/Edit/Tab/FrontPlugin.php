<?php
/**
 * Born_Catalog
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\Catalog
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\Catalog\Plugin\Adminhtml\Product\Attribute\Edit\Tab;

use Magento\Catalog\Block\Adminhtml\Product\Attribute\Edit\Tab\Advanced;
use Magento\Framework\Data\Form;

/**
 * Class FrontTabPlugin
 *
 * Product attribute edit form plugin
 *
 * @package Born\Catalog\Plugin\Adminhtml
 */
class FrontPlugin
{
    const FRONTEND_DISPLAY_ORDER = 'frontend_display_order';

    /**
     * Add new fields 'frontend_display_type' and
     * frontend_display_order into attribute edit form
     *
     * @param Advanced $subject Front Object
     * @param Object   $result  Object from parent
     * @param Form     $form    Form Object
     * @return mixed
     */
    public function afterSetForm(Advanced $subject, $result, Form $form)
    {
        /** @var Fieldset $fieldset */
        $fieldset = $form->getElement('advanced_fieldset');

        $fieldset->addField(
            self::FRONTEND_DISPLAY_ORDER,
            'text',
            [
                'name'   => self::FRONTEND_DISPLAY_ORDER,
                'label'  => __('Frontend display sort order'),
                'title'  => __('Frontend display sort order'),
                'note'   => __('set the sort frontend display'),
                'class'  => 'validate-digits',
            ]
        );

        return $result;
    }//end afterSetForm()
}//end class
