<?php
namespace Learning\FirstUnit\Block;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Learning\FirstUnit\Model\CustomerFactory;
 
class Form extends Template
{
protected $directoryBlock;
    public function __construct(CustomerFactory $customerFactory,\Magento\Directory\Block\Data $directoryBlock,Context $context, array $data = [])
    {
        parent::__construct($context, $data);
         $this->customerFactory = $customerFactory;
         $this->directoryBlock = $directoryBlock;
    }
 
    public function getFormAction()
    {
        return $this->getUrl('firstunit/index/submit', ['_secure' => true]);
    }
     public function getAllData()
    {
        $id = $this->getRequest()->getParam("customer_id");
        $model = $this->customerFactory->create();
        return $model->load($id);
    }
    public function getCountries()
         {
         $data = $this->getAllData();
         $country_id = $data->getCountry();
         $country = $this->directoryBlock->getCountryHtmlSelect($country_id);
         return $country;
         }
}


