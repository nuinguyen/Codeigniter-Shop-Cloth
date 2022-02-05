<?php

namespace App\Controllers\Admin;
use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\LoginService;


class LoginController extends BaseController
{
    /**
     *  @var Service
     */
    private $service;
    public function __construct(){
        $this->service=new LoginService();
    }
    public function index()
    {
        if(session()->has('admin_login')){
            return redirect('admin/home');
        }
        return view('admin/login');
    }
    public function login(){
        $result=$this->service->HasLogin($this->request);
        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return redirect("admin/home");
        }elseif ($result['status']=== ResultUtils::STATUS_CODE_ERR){
            return redirect("admin-login")->with($result['messageCode'],$result['message']);
        }
        return  redirect("admin/home");
    }
    public function logout(){
        $this->service->LogoutUser($this->request);
        return redirect("admin-login");
    }
}
