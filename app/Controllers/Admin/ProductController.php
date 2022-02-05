<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ClassifyService;
use App\Services\ProducerService;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\ProviderService;


class ProductController extends BaseController
{
    /**
     *  @var Service
     */
    private $product;
    private $category;
    private $classify;
    private $provider;
    private $producer;

    public function __construct(){
        $this->product=new ProductService();
        $this->category=new CategoryService();
        $this->classify=new ClassifyService();
        $this->provider=new ProviderService();
        $this->producer=new ProducerService();

    }
    public function list()
    {
        $data=[];
        $dataLayout['product']=$this->product->getAllProduct();
        $data = $this->LoadMasterLayout($data,'DS Product','admin/pages/product/list',$dataLayout);
        return view('admin/main',$data);
    }
    public function add(){
        $data=[];
        $dataLayout['category']=$this->category->getAllCategory();
        $dataLayout['classify']=$this->classify->getAllClassify();
        $dataLayout['provider']=$this->provider->getAllProvider();
        $dataLayout['producer']=$this->producer->getAllProducer();
        $data = $this->LoadMasterLayout($data,'Them Pro','admin/pages/product/add',$dataLayout);
        return view('admin/main',$data);
    }
    public function create(){
        $result=$this->product->addProductInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
    }
    /**
     * Get User by id primary key
     */
//    public  function getProductByID($id){
//        return $this->product->where('product_id',$id)->first();
//    }
    public function edit($id){
        $product=$this->product->getProductByID($id);
        if(!$product){
            return redirect('error/404');
        }
        $dataLayout['product_edit'] = $product;
        $dataLayout['product_classify'] = $this->product->getProductClassify($id);;
        $dataLayout['category']=$this->category->getAllCategory();
        $dataLayout['classify']=$this->classify->getAllClassify();
        $dataLayout['album']=$this->product->getProductAlbum($id);
        $dataLayout['provider']=$this->provider->getAllProvider();
        $dataLayout['producer']=$this->producer->getAllProducer();

        $data = $this->LoadMasterLayout([],'Sua Danh Muc','admin/pages/product/add',$dataLayout);
        return view('admin/main',$data);
    }
    public function update($id){
        $result=$this->product->updateProductInfo($this->request,$id);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }
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
