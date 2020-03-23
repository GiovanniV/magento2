<?php
namespace Born\AdobeAnalytics\ViewModel;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use \Magento\Framework\Locale\ResolverInterface as LocaleResolver;
use Magento\Framework\Serialize\Serializer\Json as JsonSerializer;


/**
 * Class Analytics
 * @package Born\AdobeAnalytics\ViewModel
 */
class Analytics extends DataObject implements ArgumentInterface{


    /**
     * @var \Born\AdobeAnalytics\Helper\Data
     */
    protected $_helper;

    /**
     * @var LocaleResolver
     */
    protected $_resolver;

    /**
     * @var JsonSerializer
     */
    protected $_json;

    /**
     * Analytics constructor.
     * @param \Born\AdobeAnalytics\Helper\Data $helper
     * @param LocaleResolver $resolver
     * @param JsonSerializer $json
     * @param array $data
     */
    public function __construct(
        \Born\AdobeAnalytics\Helper\Data $helper,
        LocaleResolver $resolver,
        JsonSerializer $json,
        array $data = []
    )
    {
        $this->_helper = $helper;
        $this->_resolver = $resolver;
        $this->_json = $json;

        parent::__construct($data);
    }


    /**
     * @return mixed
     */
    public function getWapSection(){
        return $this->_helper->getWapSection();
    }

    /**
     * @return mixed
     */
    public function getWapLocalCodeMapping(){
        return $this->_helper->getWapLocalCodeMapping();
    }

    /**
     * @return string
     */
    public function getLocale(){
        return $this->_resolver->getLocale();
    }

    /**
     * @return mixed
     */
    public function getCD2Code(){
        $wapLocalMapping = $this->_json->unserialize($this->getWapLocalCodeMapping());

        foreach($wapLocalMapping as $key => $value){
            if($this->getLocale() == $value["locale"]){
                return $value["cd2"];
            }
        }

    }

    public function getScript(){
        return $this->_helper->getScript();
    }



}