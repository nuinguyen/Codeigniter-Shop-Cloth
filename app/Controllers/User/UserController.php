<?php

namespace App\Controllers\User;
use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\CartService;
use App\Services\UserService;
use App\Services\CategoryService;


class UserController extends BaseController
{
    private $user;
    private $category;
    private $cart;
    public function __construct(){
        $this->user=new UserService();
        $this->category=new CategoryService();
        $this->cart=new CartService();
    }

    public function index(){
        $dataNavbar['category']=$this->category->getAllCategory();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();

        $data = $this->LoadUserLayout([],$dataHeader, $dataNavbar,'Đăng Nhập','pages/pages/login');

        if(session()->has('user_login')){
            return redirect('/');
        }
        return view('index',$data);
    }
    public function login(){
        $result=$this->user->HasLogin($this->request);
        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return redirect("/");
        }elseif ($result['status']=== ResultUtils::STATUS_CODE_ERR){
            return redirect("login")->with($result['messageCode'],$result['message']);
        }
        return  redirect("/");
    }
    public function logout(){
        $this->user->LogoutUser();
        return redirect("login");
    }
    public function index_register(){
        $dataNavbar['category']=$this->category->getAllCategory();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();

        $data = $this->LoadUserLayout([],$dataHeader, $dataNavbar,'Đăng Ky','pages/pages/register');
        if(session()->has('user_login')){
            return redirect('/');
        }
        return view('index',$data);
    }
    public function register(){
        $result=$this->user->addUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);


    }


}
