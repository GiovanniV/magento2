<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Api\Data;

/**
 * Interface CarouselInterface
 * @package Born\Carousel\Api\Data
 */
interface CarouselInterface
{
    const CAROUSEL_ID = 'id';
    const TITLE = 'title';
    const CTA_TEXT = 'cta_text';
    const CTA_LINK = 'cta_link';
    const ALIGNMENT = 'alignment';
    const BACKGROUND_IMAGE = 'background_image';

    /**
     * @return int | null
     */
    public function getId();

    /**
     * @param int $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getCtaText();

    /**
     * @param $cta_text
     * @return $this
     */
    public function setCtaText($cta_text);

    /**
     * @return string
     */
    public function getCtaLink();

    /**
     * @param $cta_link
     * @return $this
     */
    public function setCtaLink($cta_link);

    /**
     * @return int
     */
    public function getAlignment();

    /**
     * @param int $alignment
     * @return $this
     */
    public function setAlignment($alignment);

    /**
     * @return string
     */
    public function getBackgroundImage();

    /**
     * @param $background_image
     * @return $this
     */
    public function setBackgroundImage($background_image);
}
