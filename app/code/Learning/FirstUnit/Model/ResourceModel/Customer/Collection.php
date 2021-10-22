<?php
namespace Learning\FirstUnit\Model\ResourceModel\Customer;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
         /*$this->_init(
            \Learning\FirstUnit\Model\Customer::class,
            \Learning\FirstUnit\Model\ResourceModel\Customer::class
        );*/
        $this->_init('Learning\FirstUnit\Model\Customer', 'Learning\FirstUnit\Model\ResourceModel\Customer');
        
    }
    
}
