<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ShippingService;
use App\Services\AddressService;



class ShippingController extends BaseController
{
    /**
     *  @var Service
     */
    private $shipping;
    private $address;

    public function __construct(){
        $this->shipping=new ShippingService();
        $this->address=new AddressService();
    }
    public function fee(){
        $data=[];
        $dataLayout['shipping']=$this->shipping->getAllShipping();
        $dataLayout['city']=$this->address->getAllCity();
        $data = $this->LoadMasterLayout($data,'Phi Van Chuyen','admin/pages/shipping/fee',$dataLayout);
        return view('admin/main',$data);
    }
    public function create(){
        $result=$this->shipping->addFeeInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
    }
    public function ajaxupdatefee(){
        $result=$this->shipping->updateFee($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
    }

    /**
     * Get User by id primary key
     */
    public  function getProductByID($id){
        return $this->service->where('product_id',$id)->first();
    }
//    public function edit($id){
//        $category=$this->service->getCategoryByID($id);
//        if(!$category){
//            return redirect('error/404');
//        }
//        $data=[];
//        $dataLayout['category'] = $category;
//        $data = $this->LoadMasterLayout([],'Sua Danh Muc','admin/pages/category/edit',$dataLayout);
//        return view('admin/main',$data);
//    }
//    public function update(){
//        $result=$this->service->updateCategoryInfo($this->request);
//        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
//
//    }
//
//    public function delete($category_id){
//        $user=$this->service->getCategoryByID($category_id);
//        if(!$user){
//            return redirect('error/404');
//        }
//        $result=$this->service->deleteCategory($category_id);
//        return redirect('admin/category/list')->with($result['messageCode'],$result['message']);
//
//    }

}
