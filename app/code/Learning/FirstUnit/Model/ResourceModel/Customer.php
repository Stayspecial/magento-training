<?php
namespace Learning\FirstUnit\Model\ResourceModel;
 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Customer extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer', 'customer_id');
    }
}
