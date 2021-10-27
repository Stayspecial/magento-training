<?php
namespace Learning\FourthUnit\Plugin\StateFilter;


class StateFilter
{
protected $scopeConfig;
protected $disallowedUsStates;

public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
{
$this->scopeConfig = $scopeConfig;
}
public function afterToOptionArray($subject, $options)
{
  $disallowedUsStates = $this->scopeConfig->getValue('checkout/state_filter/us_state_filter', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
  //print_r($disallowedUsStates);
  $this->disallowedUsStates = explode(",", $disallowedUsStates);
  $result = array_filter($options, function ($option) {
  $helper = \Magento\Framework\App\ObjectManager::getInstance()->get('Learning\FourthUnit\Helper\Data');
  if (isset($option['label']) && $helper->isEnable()=='1')
   return !in_array($option['label'], $this->disallowedUsStates);
   return true;

  });
return $result;
}



}
