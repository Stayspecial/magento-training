<?php
namespace Learning\SecondUnit\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;
use Learning\SecondUnit\Model\Post as Post;

class NewAction extends \Magento\Backend\App\Action
{
   
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $contactDatas = $this->getRequest()->getParam('contact');
        //echo 'test';
      //print_r($contactDatas);
        if(is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Post::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            $this->messageManager->addSuccess(__('Data has been added successfully!'));
            return $resultRedirect->setPath('learning_secondunit/post');
        }
    }
}
