<?php

namespace App\Controllers\User;
use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Model\Cart;
use App\Models\UserModel;
use App\Services\CartService;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Controllers\UserController;


class CartController extends BaseController
{
    private $cart;
    private $category;
    private $product;

    public function __construct(){
        $this->cart=new CartService();
        $this->category=new CategoryService();
        $this->product=new ProductService();
    }
    public function cart()
    {
        if(session()->has('user_login')){
            $dataLayout['cart']=$this->cart->getAllCart();
        $dataNavbar['category']=$this->category->getAllCategory();
        $dataNavbar['product']=$this->product->getRamdomProduct();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();
        $data = $this->LoadUserLayout([],$dataHeader, $dataNavbar,'Sua Danh Muc','pages/pages/cart',$dataLayout);
        return view('index',$data);
        }
        return redirect('login');
    }
    public function add_cart(){
            $result=$this->cart->addCartInfo($this->request);
            return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
    }
    public function delete_cart($product_id){
//        $product=$this->service->getCartByID($product_id);
//        if(!$product){
//            return redirect('error/404');
//        }
        $result=$this->service->deleteCart($product_id);
        return redirect()->back()->with($result['messageCode'],$result['message']);
    }
    public function update_amount_cart(){
        $this->cart->UpdateAmountCart($this->request);
    }
}
