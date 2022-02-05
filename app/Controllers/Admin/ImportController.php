<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ImportService;
use App\Services\ProductService;


class ImportController extends BaseController
{
    /**
     *  @var Service
     */
    private $import;
    private $product;
    public function __construct(){
        $this->import=new ImportService();
        $this->product=new ProductService();
    }
    public function add()
    {
        $dataLayout['product']=$this->product->getAllProduct();
        $data = $this->LoadMasterLayout([],'Nhap Kho','admin/pages/import/import',$dataLayout);
        return view('admin/main',$data);
    }
    public function create(){
        $result=$this->import->addImportInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }
    public function list()
    {
        $dataLayout['import']=$this->import->getAllImport();
        $data = $this->LoadMasterLayout([],'Nhap Kho','admin/pages/import/list_import',$dataLayout);
        return view('admin/main',$data);
    }
    public function move($id){
        $result=$this->import->updateImportStatus($id);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }

    public function edit($id){
        $category=$this->service->getCategoryByID($id);
        if(!$category){
            return redirect('error/404');
        }
        $data=[];
        $dataLayout['category'] = $category;
        $data = $this->LoadMasterLayout([],'Sua Danh Muc','admin/pages/category/edit',$dataLayout);
        return view('admin/main',$data);
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
