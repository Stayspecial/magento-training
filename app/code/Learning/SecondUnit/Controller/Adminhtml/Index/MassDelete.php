<?php
namespace Learning\SecondUnit\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Learning\SecondUnit\Model\ResourceModel\Post\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{

    protected $_filter;
    protected $serviceFactory;

    public function __construct(
        Context $context,
        Filter $filter,
        \Learning\SecondUnit\Model\PostFactory $serviceFactory,
        CollectionFactory $collectionFactory
    ) {

        $this->_filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->serviceFactory = $serviceFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) 
        {
        //print_r($item->getPostId());exit;
        $item = $this->serviceFactory->create()->load($item->getPostId());
        $item->delete();
        }

        $this->messageManager->addSuccess(__('A total of %1 element(s) have been deleted.', $collectionSize));
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        
        //$resultRedirect->setPath($this->getComponentRefererUrl());

       //return $resultRedirect;
       return $resultRedirect->setPath('learning_secondunit/post');
    }   
}
