<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\CategoryService;


class CategoryController extends BaseController
{
    /**
     *  @var Service
     */
private $service;
public function __construct(){
    $this->service=new CategoryService();
}

    public function list()
    {
        $data=[];
        $dataLayout['category']=$this->service->getAllCategory();
        $data = $this->LoadMasterLayout($data,'DS Category','admin/pages/category/list',$dataLayout);
        return view('admin/main',$data);
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
