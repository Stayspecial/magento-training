<?php

namespace Learning\FirstUnit\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Learning\FirstUnit\Model\CustomerFactory;

class Index extends Action {
    protected $resultPageFactory;
    
    private $customerFactory;
 
    private $url;


    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        UrlInterface $url,
        CustomerFactory $customerFactory,
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->customerFactory = $customerFactory;
        $this->url = $url;
 
    }


    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
     
     
    public function execute()
    {
       if ($this->isCorrectData()) {
        //$page = $this->pageFactory->create();
        //return $page;
        
        return $this->resultPageFactory->create();
        }
        else {
            $this->messageManager->addErrorMessage(__("Record Not Found"));
	    $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->url->getUrl('firstunit/index/showdata'));
	    return $resultRedirect;
           }
        
    }
      public function isCorrectData()
    {
    
        if ($id = $this->getRequest()->getParam("customer_id")) {
    
            $model = $this->customerFactory->create();
            $model->load($id,'customer_id');
            //$model->setData(['customer_id' => $id, 'name' => 'Test Name']);
            //$model->save();
            if ($model->getId()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}
