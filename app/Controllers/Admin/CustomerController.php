<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\CustomerService;


class CustomerController extends BaseController
{
    /**
     *  @var Service
     */
    private $service;
    public function __construct(){
        $this->service=new CustomerService();
    }

    public function order()
    {
        $dataLayout['order']=$this->service->getAllOrder();
        $data = $this->LoadMasterLayout([],'DS Order','admin/pages/customer/order',$dataLayout);
        return view('admin/main',$data);
    }
    public function view($id){
        $order_detail=$this->service->getOrderDetailByID($id);
        if(!$order_detail){
            return redirect('error/404');
        }
        $dataLayout['order_detail'] = $order_detail;
        $data = $this->LoadMasterLayout([],'Sua Danh Muc','admin/pages/customer/order_detail',$dataLayout);
        return view('admin/main',$data);
    }
    public function move($id){
        $order_detail=$this->service->UpdateStatusOrder($id);
        if(!$order_detail){
            return redirect('error/404');
        }
        return redirect()->back()->with($order_detail['messageCode'],$order_detail['message']);
    }






    public function add(){
        $data=[];
        $data = $this->LoadMasterLayout($data,'DS Category','admin/pages/category/add');
        return view('admin/main',$data);
    }

    public function create(){
        $result=$this->service->addCategoryInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }

    public function update(){
        $result=$this->service->updateCategoryInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }

    public function delete($category_id){
        $user=$this->service->getCategoryByID($category_id);
        if(!$user){
            return redirect('error/404');
        }
        $result=$this->service->deleteCategory($category_id);
        return redirect('admin/category/list')->with($result['messageCode'],$result['message']);

    }

}
