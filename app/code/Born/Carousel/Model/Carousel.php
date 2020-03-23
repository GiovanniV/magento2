<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Model;

use Born\Carousel\Api\Data\CarouselInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Carousel
 * @package Born\Carousel\Model
 */
class Carousel extends AbstractModel implements CarouselInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(CarouselInterface::CAROUSEL_ID);
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(CarouselInterface::CAROUSEL_ID, $id);
    }

    /**
     * @return int
     */
    public function getTitle()
    {
        return $this->getData(CarouselInterface::TITLE);
    }

    /**
     * @param $question_tab_id
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData(CarouselInterface::TITLE, $title);
    }

    /**
     * @return int
     */
    public function getCtaText()
    {
        return $this->getData(CarouselInterface::CTA_TEXT);
    }

    /**
     * @param $question_type_id
     * @return $this
     */
    public function setCtaText($cta_text)
    {
        return $this->setData(CarouselInterface::CTA_TEXT, $cta_text);
    }

    /**
     * @return string
     */
    public function getCtaLink()
    {
        return $this->getData(CarouselInterface::CTA_LINK);
    }

    /**
     * @param $question
     * @return $this
     */
    public function setCtaLink($cta_text)
    {
        return $this->setData(CarouselInterface::CTA_LINK, $cta_text);
    }

    /**
     * @return string
     */
    public function getAlignment()
    {
        return $this->getData(CarouselInterface::ALIGNMENT);
    }

    /**
     * @param $answer
     * @return $this
     */
    public function setAlignment($alignment)
    {
        return $this->setData(CarouselInterface::ALIGNMENT, $alignment);
    }

    /**
     * @return int
     */
    public function getBackgroundImage()
    {
        return $this->getData(CarouselInterface::BACKGROUND_IMAGE);
    }

    /**
     * @param $is_active
     * @return $this
     */
    public function setBackgroundImage($background_image)
    {
        return $this->setData(CarouselInterface::BACKGROUND_IMAGE, $background_image);
    }

    /**
     * Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Born\Carousel\Model\ResourceModel\Carousel');
    }
}
