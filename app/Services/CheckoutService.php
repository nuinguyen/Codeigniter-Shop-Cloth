<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\CartDetailModel;
use App\Models\CityModel;
use App\Models\DistrictModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ReceiverModel;
use App\Models\ShippingModel;
use App\Models\VillageModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\CartModel;

class CheckoutService extends BaseService
{
    private $cart;
    private $cartdetail;
    private $city;
    private $district;
    private $village;
    private $shipping;
    private $receiver;
    private $order;
    private $orderdetail;
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
        $this->village=new VillageModel();
        $this->village->protect(false);
        $this->district=new DistrictModel();
        $this->district->protect(false);
        $this->city=new CityModel();
        $this->city->protect(false);
        $this->receiver=new ReceiverModel();
        $this->receiver->protect(false);
        $this->order=new OrderModel();
        $this->order->protect(false);
        $this->orderdetail=new OrderDetailModel();
        $this->orderdetail->protect(false);
        $this->shipping=new ShippingModel();
        $this->shipping->protect(false);
    }
    /**
     * Get all data users
     */
    public function getChooseCart($requestData)
    {
        $data=$requestData->getPost();
        $user_id_cart=session()->get('user_login');
        $cart=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
        //dd($data);
        return $this->cartdetail->where('cart_id',$cart['cart_id'])
            ->join('tbl_product','tbl_cart_detail.product_id = tbl_product.product_id')
            ->join('tbl_classify','tbl_cart_detail.classify_id = tbl_classify.classify_id')
            ->whereIn('cart_detail_id', $data['product'])
            ->findAll();
    }
    public function addPurchse($requestData){
        $data=$requestData->getPost();
        //dd($data['product_id']);
        $city_name=$this->city->where('city_id',$data['city'])->first();
        $district_name=$this->district->where('district_id',$data['district'])->first();
        $village_name=$this->village->where('village_id',$data['village'])->first();
        $dataReceiver=[
          'receiver_name'=>$data['receiver_name'],
          'receiver_address'=>$data['way_name'].'-'.$village_name['village_name'].'-'.$district_name['district_name'].'-'.$city_name['city_name'],
          'receiver_phone'=>$data['receiver_phone'],
          'receiver_note'=>$data['receiver_note'],
        ];
        $this->receiver->save($dataReceiver);
        //dd($dataReceiver);

        $user_id_cart=session()->get('user_login');
        $receiver_id=$this->receiver->selectMax('receiver_id')->first();
        $shipping_fee=$this->shipping->where('city_id',$data['city'])
            ->where('district_id',$data['district'])
            ->where('village_id',$data['village'])->first();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(empty($shipping_fee)){
            $shipping_fee['shipping_fee']=25000;
        }
        $dataOrder=[
            'user_id'=>$user_id_cart['user_id'],
            'receiver_id'=>$receiver_id['receiver_id'],
            'order_shipping_fee'=>$shipping_fee['shipping_fee'],
            'order_method'=>$data['order_method'],
            'order_status'=>0,
            'order_date'=>date('Y-m-d H:i:s'),
        ];
        $this->order->save($dataOrder);
        //dd($dataOrder);
        $cart_id=$this->cart->where('user_id',$user_id_cart['user_id'])->first();
        $order_id=$this->order->selectMax('order_id')->first();
        $product_detail=$this->cartdetail->where('cart_id',$cart_id['cart_id'])
            ->whereIn('product_id',$data['product_id'])->findAll();
        //dd($product_detail);

        foreach ($product_detail as $pro_de){
            $dataOrderDetail=[
                'order_id'=>$order_id['order_id'],
                'product_id'=>$pro_de['product_id'],
                'classify_id'=>$pro_de['classify_id'],
                'order_detail_amount'=>$pro_de['cart_detail_amount'],
            ];
            $this->cartdetail->where('cart_id',$cart_id['cart_id'])
                ->where('product_id',$pro_de['product_id'])
                ->delete();
            $this->orderdetail->save($dataOrderDetail);
        }
        //dd($dataOrderDetail);



    }










    /**
     * add new user info
     */


    /**
     * Get User by id primary key
     */
    public  function getCartByID($product_id){
        $user_id_cart['user_id']=session()->get('user_login')['user_id'];
        $cart=$this->cart->where('user_id',$user_id_cart)->first();
        return $this->cartdetail->where('cart_id',$cart['cart_id'])->where('product_id',$product_id)->first();
    }
    /**
     * Get User by id primary key
     */
    public  function deleteCart($product_id){
        try{
            $user_id_cart['user_id']=session()->get('user_login')['user_id'];
            $cart=$this->cart->where('user_id',$user_id_cart)->first();
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
