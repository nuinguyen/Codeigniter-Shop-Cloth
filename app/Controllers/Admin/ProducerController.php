<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ProducerService;


class ProducerController extends BaseController
{

    private $producer;
    public function __construct(){
        $this->producer=new ProducerService();
    }

    public function producer()
    {
        $dataLayout['producer']=$this->producer->getAllProducer();
        $data = $this->LoadMasterLayout([],'Phan Loai','admin/pages/producer/producer',$dataLayout);
        return view('admin/main',$data);
    }

    public function create(){
        $result=$this->producer->addProducerInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }
    public function edit($id){
        $producer_edit=$this->producer->getProducerByID($id);
        if(!$producer_edit){
            return redirect('error/404');
        }
        $dataLayout['producer_edit'] = $producer_edit;
        $dataLayout['producer']=$this->producer->getAllProducer();
        $data = $this->LoadMasterLayout([],'Sua Phan Loai','admin/pages/producer/producer',$dataLayout);
        return view('admin/main',$data);
    }
    public function update($id){
        $result=$this->producer->updateProducerInfo($this->request,$id);
        return redirect('admin/producer/producer')->with($result['messageCode'],$result['message']);
    }

//

}
