<?php
namespace Learning\ThirdUnit\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
        parent::__construct($context);
    }

    public function isEnable()
    {
    
    return $this->scopeConfig->getValue('thirdunit/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function isEnableExtension()
    {
    
    return $this->scopeConfig->getValue('thirdunit_extension/state_filter/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}

