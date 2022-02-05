<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\CustomerService;
use App\Services\ProductService;


class CustomerController extends BaseController
{
    /**
     *  @var Service
     */
    private $category;
    private $cart;
    private $customer;

    public function __construct(){
        $this->category=new CategoryService();
        $this->cart=new CartService();
        $this->customer=new CustomerService();
    }
    public function my_order()
    {
        $dataLayout['order']=$this->customer->getOrderById();
        $dataLayout['order_detail']=$this->customer->getOrderDetailByIdOder();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();
        $dataNavbar['category']=$this->category->getAllCategory();
        $data = $this->LoadUserLayout([],$dataHeader, $dataNavbar,'Don hang','pages/pages/my_order',$dataLayout);
        return view('index',$data);
    }
    public function ajax_order_status(){
        $this->customer->getOrderStatus($this->request);
    }
    public function cancel_order(){
        $this->customer->cancelOrder($this->request);
    }

}
