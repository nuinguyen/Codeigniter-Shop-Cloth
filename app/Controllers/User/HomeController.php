<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Model\Product;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\ProductService;


class HomeController extends BaseController
{
    private $category;
    private $product;
    private $cart;
    public function __construct(){
        $this->category=new CategoryService();
        $this->product=new ProductService();
        $this->cart=new CartService();
    }
    public function index()
    {
        $data=[];
        $dataNavbar['category']=$this->category->getAllCategory();
        $dataProduct['product']=$this->product->getAllProduct();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();
        $data = $this->LoadUserLayout($data,$dataHeader,$dataNavbar,'Trang chu','pages/pages/home',$dataProduct);
        return view('index',$data);
    }
    public  function success(){
        $data=[];
        $dataNavbar['category']=$this->category->getAllCategory();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();
        $data = $this->LoadUserLayout($data,$dataHeader,$dataNavbar,'Trang chu','pages/pages/success');
        return view('index',$data);
    }
}
