<?php
namespace Learning\FirstUnit\Model;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Customer extends AbstractModel
{
    protected function _construct()
    {
     
        $this->_init(\Learning\FirstUnit\Model\ResourceModel\Customer::class);
    }
}
