<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\AdminService;

class AdminController extends BaseController
{

private $admin;
public function __construct(){
    $this->admin=new AdminService();
}

    public function list()
    {
        $data=[];
        $dataLayout['admin']=$this->admin->getAllUsers();
        $data = $this->LoadMasterLayout($data,'DS TK','admin/pages/user/list',$dataLayout);
        return view('admin/main',$data);
    }
    public function add(){
        $data=[];
        $data = $this->LoadMasterLayout($data,'DS TK','admin/pages/user/add');
        return view('admin/main',$data);
    }
    public function create(){
       $result=$this->admin->addUserInfo($this->request);
       return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }
    public function edit($id){
        $admin=$this->admin->getUserByID($id);
        if(!$admin){
            return redirect('error/404');
        }
        $dataLayout['admin'] = $admin;
        $data = $this->LoadMasterLayout([],'Sua TK','admin/pages/user/edit',$dataLayout);
        return view('admin/main',$data);
    }
    public function update(){
        $result=$this->admin->updateUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);

    }

    public function delete($admin_id){
        $admin=$this->admin->getUserByID($admin_id);
        if(!$admin){
            return redirect('error/404');
        }
        $result=$this->admin->deleteUser($admin_id);
        return redirect('admin/user/list')->with($result['messageCode'],$result['message']);

    }

}
