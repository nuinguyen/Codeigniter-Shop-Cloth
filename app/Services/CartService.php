<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\CartDetailModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\CartModel;

class CartService extends BaseService
{
    private $cart;
    private $cartdetail;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->cart=new CartModel();
        $this->cart->protect(false);
        $this->cartdetail=new CartDetailModel();
        $this->cartdetail->protect(false);
    }
    /**
     * Get all cart mini
     */
    public function getMiniCart(){
        $user_id_cart=session()->get('user_login');
        $cart=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
        return $this->cartdetail->where('cart_id',$cart['cart_id'])
            ->join('tbl_product','tbl_cart_detail.product_id = tbl_product.product_id')
            ->join('tbl_classify','tbl_classify.classify_id = tbl_cart_detail.classify_id')
            ->orderBy('cart_detail_id','desc')
            ->paginate(3);
    }
    /**
     * Get all data users
     */
    public function getAllCart()
    {
        $user_id_cart=session()->get('user_login');
        $cart=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
        return $this->cartdetail->where('cart_id',$cart['cart_id'])
            ->join('tbl_product','tbl_cart_detail.product_id = tbl_product.product_id')
            ->join('tbl_classify','tbl_classify.classify_id = tbl_cart_detail.classify_id')
            ->orderBy('cart_detail_id','desc')
            ->findAll();
    }
    /**
     *  cap nhat so luong sp tron gio hang
     */
    public function UpdateAmountCart($requestData){
        $dataSave=$requestData->getPost();
        $user_id_cart=session()->get('user_login');
        $cart=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
        $this->cartdetail->where('cart_id',$cart['cart_id'])
            ->where('product_id', $dataSave['product_id'])
                ->where('classify_id',$dataSave['classify_id'])
                ->set(['cart_detail_amount'=>$dataSave['cart_amount']])
                ->update();

        $cart_detail=$this->cartdetail->where('cart_id',$cart['cart_id'])
            ->join('tbl_product','tbl_cart_detail.product_id = tbl_product.product_id')
            ->where('tbl_cart_detail.product_id', $dataSave['product_id'])
            ->where('classify_id',$dataSave['classify_id'])->first();
        $output= number_format( $cart_detail['cart_detail_amount']*$cart_detail['product_price'], 0, ',', '.') . ' ' . 'VNĐ';
        $output.='<input type="hidden" class="cart-total" value="'.$cart_detail['cart_detail_amount']*$cart_detail['product_price'].'">';
         echo $output;
    }
    /**
     * add new user info
     */
    public function addCartInfo($requestData){
        $validate = $this->validateAddUser($requestData);
        $user_id_cart=session()->get('user_login');
        $cart=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
        $dataSave = $requestData->getPost();
        //dd( $dataSave['cart_detail_amount']);
        //dd($this->cart->selectMax('cart_id')->first());
        // check xem ton tai cart chua
        if(!empty($cart)){
            $product=$this->cartdetail->where('cart_id',$cart['cart_id'])
                ->where('product_id',$dataSave['product_id'])->where('classify_id',$dataSave['classify_id'])->first();
            // check san pham co trong cart chu
            if(!empty($product)){
                if($product['classify_id']==$dataSave['classify_id']){
                    try{
                        $dataSave['cart_id']=$cart['cart_id'];
                        $dataSave['cart_detail_id']=$product['cart_detail_id'];
                        $dataSave['cart_detail_amount']=$product['cart_detail_amount']+$dataSave['cart_detail_amount'];
                        $this->cartdetail->save($dataSave);
                        return [
                            'status' =>  ResultUtils::STATUS_CODE_OK,
                            'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                            'message'=> ['success' =>'cap nhat du lieu thanh cong']
                        ];
                    }catch (Exception $e) {
                        return [
                            'status' => ResultUtils::STATUS_CODE_ERR,
                            'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                            'message' => ['success' => $e->getMessage()]
                        ];
                    }
                }else{
                    try{
                        $dataSave['cart_id']=$cart['cart_id'];
                        $this->cartdetail->save($dataSave);
                        return [
                            'status' =>  ResultUtils::STATUS_CODE_OK,
                            'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                            'message'=> ['success' =>'cap nhat du lieu thanh cong']
                        ];
                    }catch (Exception $e) {
                        return [
                            'status' => ResultUtils::STATUS_CODE_ERR,
                            'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                            'message' => ['success' => $e->getMessage()]
                        ];
                    }
                }
            }else{
                try{
                    $dataSave['cart_id']=$cart['cart_id'];
                    $this->cartdetail->save($dataSave);
                    return [
                        'status' =>  ResultUtils::STATUS_CODE_OK,
                        'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                        'message'=> ['success' =>'cap nhat du lieu thanh cong']
                    ];
                }catch (Exception $e) {
                    return [
                        'status' => ResultUtils::STATUS_CODE_ERR,
                        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                        'message' => ['success' => $e->getMessage()]
                    ];
                }
            }
        }else{
            try{
                $this->cart->save($user_id_cart);
                $dataSave['cart_id']=$this->cart->selectMax('cart_id')->first();
                $this->cartdetail->save($dataSave);
                return [
                    'status' =>  ResultUtils::STATUS_CODE_OK,
                    'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                    'message'=> ['success' =>'cap nhat du lieu thanh cong']
                ];
            }catch (Exception $e) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['success' => $e->getMessage()]
                ];
            }
        }

    }

    /**
     * Get User by id primary key
     */
    public  function getCartByID($product_id){
        $user_id_cart=session()->get('user_login')['user_id'];
        $cart=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
        return $this->cartdetail->where('cart_id',$cart['cart_id'])->where('product_id',$product_id)->first();
    }
    /**
     * Get User by id primary key
     */
    public  function deleteCart($product_id){
        try{
            $user_id_cart=session()->get('user_login')['user_id'];
            $cart=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
            $this->cartdetail->where('cart_id',$cart['cart_id'])->where('product_id',$product_id)->delete();
            return [
                'status' =>  ResultUtils::STATUS_CODE_OK,
                'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                'message'=> ['success' =>'xoa du lieu thanh cong']
            ];
        }catch (Exception $e){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> ['success' => $e->getMessage()]
            ];
        }
    }
    private  function validateAddUser($requestData){
        $rule=[
            'category_name' => 'max_length[200]',

        ];
        $message=[
            'category_name'=>[
                'valid_email'=>'Qua ngan',
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
    private  function validateEditCategory($requestData){
//        dd($requestData->getPost('user_id'));
        $rule=[
            'category_name' => 'max_length[100]',

        ];
        $message=[
            'category_name'=>[
                'max_length' =>' ten qua dai'
            ],

        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

}
