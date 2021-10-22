<?php
namespace Learning\SecondUnit\Controller\Adminhtml\Index;
use Learning\SecondUnit\Model\Post as Post;
use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
   
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
        $id = $this->getRequest()->getParam('id');
        //echo $id;
        $contactDatas = $this->getRequest()->getParam('contact');
        // echo 'mi';
        //print_r($id);exit;
        if(is_array($contactDatas)) {
        $contact = $this->_objectManager->create(Post::class);
        //print_r($contact);exit;
        $contact->setData(['post_id' => $id, 'name' => $contactDatas['name'],'email' => $contactDatas['email'],'telephone' =>$contactDatas['telephone']]);
        $contact->save();
         $resultRedirect = $this->resultRedirectFactory->create();
            $this->messageManager->addSuccess(__('Data updated successfully!'));
            return $resultRedirect->setPath('learning_secondunit/post');
        }
        
        }
    
    
}
