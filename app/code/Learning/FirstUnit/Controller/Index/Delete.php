<?php
namespace Learning\FirstUnit\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Learning\FirstUnit\Model\CustomerFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Delete extends Action
{
    protected $resultPageFactory;
    protected $customerFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CustomerFactory $customerFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->customerFactory = $customerFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getParams();
            if ($data) {
                $model = $this->customerFactory->create()->load($data['customer_id']);
                $model->delete();
                $this->messageManager->addSuccessMessage(__("Record Delete Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t delete record, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}
