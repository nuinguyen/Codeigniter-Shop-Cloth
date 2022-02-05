<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Model\Cart;
use App\Models\UserModel;
use App\Services\CartService;
use App\Services\CheckoutService;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Controllers\UserController;
use App\Services\ShippingService;
use App\Services\UserService;
use App\Services\AddressService;


class CheckoutController extends BaseController
{
    private $checkout;
    private $user;
    private $category;
    private $address;
    private $shipping;
    private $cart;

    public function __construct(){
        $this->checkout=new CheckoutService();
        $this->category=new CategoryService();
        $this->user=new UserService();
        $this->address=new AddressService();
        $this->shipping=new ShippingService();
        $this->cart=new CartService();

    }
    public function checkout()
    {
        $dataLayout['checkout']=$this->checkout->getChooseCart($this->request);
        $dataLayout['user']=$this->user->CheckoutIdUser();
        $dataLayout['city']=$this->address->getAllCity();
        $dataNavbar['category']=$this->category->getAllCategory();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();
        $data = $this->LoadUserLayout([],$dataHeader, $dataNavbar,'Sua Danh Muc','pages/pages/checkout',$dataLayout);
        return view('index',$data);
    }
    public function ajax_address(){
        $this->address->checkAddress($this->request);
    }
    public function ajax_calculate_fee(){
        $this->shipping->calculateFee($this->request);
    }
    public function purchase(){
        $this->checkout->addPurchse($this->request);
        return redirect("success");

    }
//
//    public function add_cart(){
//        //dd('test');
//        $result=$this->cart->addCartInfo($this->request);
//        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
//    }
//    public function delete_cart($product_id){
////        $product=$this->service->getCartByID($product_id);
////        if(!$product){
////            return redirect('error/404');
////        }
//        $result=$this->cart->deleteCart($product_id);
//        return redirect()->back()->with($result['messageCode'],$result['message']);
//    }
}
