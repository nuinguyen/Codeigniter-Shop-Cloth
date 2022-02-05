<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ProviderService;


class ProviderController extends BaseController
{

    private $provider;
    public function __construct(){
        $this->provider=new ProviderService();
    }

    public function provider()
    {
        $dataLayout['provider']=$this->provider->getAllProvider();
        $data = $this->LoadMasterLayout([],'Phan Loai','admin/pages/provider/provider',$dataLayout);
        return view('admin/main',$data);
    }

    public function create(){
        $result=$this->provider->addProviderInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }
    public function edit($id){
        $provider_edit=$this->provider->getProviderByID($id);
        if(!$provider_edit){
            return redirect('error/404');
        }
        $dataLayout['provider_edit'] = $provider_edit;
        $dataLayout['provider']=$this->provider->getAllProvider();
        $data = $this->LoadMasterLayout([],'Sua Phan Loai','admin/pages/provider/provider',$dataLayout);
        return view('admin/main',$data);
    }
    public function update($id){
        $result=$this->provider->updateProviderInfo($this->request,$id);
        return redirect('admin/provider/provider')->with($result['messageCode'],$result['message']);
    }

//

}
