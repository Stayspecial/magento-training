<?php
namespace Learning\FirstUnit\Block;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Learning\FirstUnit\Model\ResourceModel\Customer\CollectionFactory;
 
class Showdata extends Template
{
 
    public $collection;
 
    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }
 
    public function getCollection()
    {
        return $this->collection->create();
    }
    public function getDeleteAction()
    {
        return $this->getUrl('firstunit/index/delete', ['_secure' => true]);
    }
    public function getEditAction()
    {
        return $this->getUrl('firstunit/index/index', ['_secure' => true]);
    }
 
}
