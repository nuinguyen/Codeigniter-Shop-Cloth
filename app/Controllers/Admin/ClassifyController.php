<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ClassifyService;


class ClassifyController extends BaseController
{
    /**
     *  @var Service
     */
    private $classify;
    public function __construct(){
        $this->classify=new ClassifyService();
    }

    public function classify()
    {
        $data=[];
        $dataLayout['classify']=$this->classify->getAllClassify();
        $data = $this->LoadMasterLayout($data,'Phan Loai','admin/pages/classify/classify',$dataLayout);
        return view('admin/main',$data);
    }
//    public function add(){
//        $data=[];
//        $data = $this->LoadMasterLayout($data,'DS Category','admin/pages/category/add');
//        return view('admin/main',$data);
//    }
//
    public function create(){
        $result=$this->classify->addClassifyInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }
    public function edit($id){
        $classify_edit=$this->classify->getClassifyByID($id);
        if(!$classify_edit){
            return redirect('error/404');
        }
        $dataLayout['classify_edit'] = $classify_edit;
        $dataLayout['classify']=$this->classify->getAllClassify();
        $data = $this->LoadMasterLayout([],'Sua Phan Loai','admin/pages/classify/classify',$dataLayout);
        return view('admin/main',$data);
    }
    public function update($id){
        $result=$this->classify->updateClassifyInfo($this->request,$id);
        return redirect('admin/classify/classify')->with($result['messageCode'],$result['message']);
    }

//

}
