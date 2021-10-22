<?php
 
namespace Learning\FirstUnit\Controller\Index;
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Learning\FirstUnit\Model\CustomerFactory;
 
class Submit extends Action
{
    protected $resultPageFactory;
    protected $customerFactory;
    private $url;
 
    public function __construct(
        UrlInterface $url,
        Context $context,
        PageFactory $resultPageFactory,
        CustomerFactory $customerFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->customerFactory = $customerFactory;
        $this->url = $url;
        parent::__construct($context);
    }
 
    public function execute()
    {
    
       
        /* $post = $this->getRequest()->getPost();
         print_r($post);
        if ($post) {
        $model = $this->customerFactory->create();
        $model->setData($data)->save();
         $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
        }else {
         $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        */
       // $post = $this->getRequest()->getPostValue();

        /*echo "<pre>";
        print_r($post);
        exit;
        */
        try {
            $data = (array)$this->getRequest()->getPost();
            //print_r($data);exit;
           $id = $this->_request->getParam('id');
           //echo $id;exit;
           //echo date('Y-m-d', strtotime($data['dob']));exit;
            if ($data) {
               if ($id = $this->getRequest()->getParam("id")) {
               $model = $this->customerFactory->create();
               //$model->load($id,'customer_id');
               $model->setData(['customer_id' => $id, 'name' => $data['name'],'email' => $data['email'],'telephone' =>$data['telephone'],'date_at' =>date('Y-d-m', strtotime($data['dob'])),'gender' =>$data['gender'],'country' =>$data['country_id']]);
               $model->save();
                $this->messageManager->addSuccessMessage(__("Data Updated Successfully!!"));
               } else {
                $model = $this->customerFactory->create();
                $model->setData(['name' => $data['name'],'email' => $data['email'],'telephone' =>$data['telephone'],'date_at' =>date('Y-d-m', strtotime($data['dob'])),'gender' =>$data['gender'],'country' =>$data['country_id']]);
                //$model->setData($data)->save();
                $model->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully!"));
                }
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->url->getUrl('firstunit/index/showdata'));
        return $resultRedirect;
        
 
    }
}
