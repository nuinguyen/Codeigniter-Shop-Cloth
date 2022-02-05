<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Model\Product;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\ClassifyService;
use App\Services\ProductClassifyService;
use App\Services\ProductService;


class ProductDetailController extends BaseController
{
    private $productdetail;
    private $category;
    private $productclassify;
    private $cart;

    public function __construct(){
        $this->productdetail=new ProductService();
        $this->category=new CategoryService();
        $this->productclassify=new ProductClassifyService();
        $this->cart=new CartService();

    }
    public function product_detail($id)
    {
        $product=$this->productdetail->getProductByID($id);
        if(!$product){
            return redirect('error/404');
        }
        $dataLayout['related_product']=$this->productdetail->getRelatedProduct($id);
        $dataLayout['product'] = $product;
        $dataLayout['classify'] = $this->productclassify->getProductClassify($id);
        $dataLayout['album'] = $this->productdetail->getProductAlbum($id);
        $dataNavbar['category']=$this->category->getAllCategory();
        $dataHeader['mini_cart']=$this->cart->getMiniCart();
        $data = $this->LoadUserLayout([],$dataHeader, $dataNavbar,'Sua Danh Muc','pages/pages/product_detail',$dataLayout);
        return view('index',$data);
    }
}
