<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\ProductService;


class CategoryController extends BaseController
{
    /**
     *  @var Service
     */
    private $product;
    private $category;
    private $cart;

    public function __construct(){
        $this->product=new ProductService();
        $this->category=new CategoryService();
        $this->cart=new CartService();
    }
    public function category($id)
    {
        $check_category=$this->category->getCategoryByID($id);
        if(!$check_category){
            return redirect('error/404');
        }
        $dataHeader['mini_cart']=$this->cart->getMiniCart();
        $dataLayout['product']=$this->product->getProductByCategory($id);
        $dataNavbar['category']=$this->category->getAllCategory();
        $data = $this->LoadUserLayout([],$dataHeader, $dataNavbar,'Sua Danh Muc','pages/pages/category',$dataLayout);
        return view('index',$data);
    }

}
