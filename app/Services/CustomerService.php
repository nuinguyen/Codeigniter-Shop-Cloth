<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\WarehouseModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class CustomerService extends BaseService
{
    private $order;
    private $orderdetail;
    private $warehouse;

    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->order=new OrderModel();
        $this->order->protect(false);
        $this->orderdetail=new OrderDetailModel();
        $this->orderdetail->protect(false);
        $this->warehouse=new WarehouseModel();
        $this->warehouse->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllOrder()
    {
        return $this->order->findAll();
    }
    /**
     * Get User by id primary key
     */
    public  function getOrderDetailByID($order_id){
        return $this->orderdetail->where('tbl_order_detail.order_id',$order_id)
            ->join('tbl_order','tbl_order.order_id = tbl_order_detail.order_id')
            ->join('tbl_user','tbl_order.user_id = tbl_user.user_id')
            ->join('tbl_receiver','tbl_order.receiver_id = tbl_receiver.receiver_id')
            ->join('tbl_product','tbl_order_detail.product_id = tbl_product.product_id')
            ->join('tbl_classify','tbl_classify.classify_id = tbl_order_detail.classify_id')
            ->findAll();
    }

    /**
     * @param $order_id
     * @return array
     * @throws \ReflectionException
     * CustomCOntroller Admin
     */
    public function UpdateStatusOrder($order_id){
        try{
            $var=$this->order->where('order_id',$order_id)->first();
            $this->order->where('order_id',$order_id)
                ->set(['order_status'=>$var['order_status']+1,'order_date'=>date('Y-m-d H:i:s')])->update();
//            dd($var['order_status']);
            $order=$this->order->where('tbl_order.order_id',$order_id)
                ->join('tbl_order_detail','tbl_order_detail.order_id = tbl_order.order_id')->findAll();
                if($var['order_status']==1){
                    $warehouse=$this->warehouse->where('warehouse_year',date('Y'))
                        ->where('warehouse_month',date('m'))->findAll();

                    foreach ($order as $item_order){
                        foreach ($warehouse as $item_warehouse){
                            if($item_order['product_id']==$item_warehouse['product_id']   ){
                                $ware=  $this->warehouse->where('product_id',$item_order['product_id'])
                                    ->where('warehouse_year',date('Y'))
                                    ->where('warehouse_month',date('m'))
                                    ->first();
                                $this->warehouse->where('product_id',$item_order['product_id'])
                                    ->where('warehouse_year',date('Y'))
                                    ->where('warehouse_month',date('m'))
                                    ->set(['warehouse_sum_inventory'=>$ware['warehouse_sum_inventory']-$item_order['order_detail_amount']])
                                    ->update();
                            }
                        }
                    }
                }
            return [
                'status' =>  ResultUtils::STATUS_CODE_OK,
                'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                'message'=> ['success' =>'cap nhat dl thanh cong']
            ];
        }catch (Exception $e){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> ['success' => $e->getMessage()]
            ];
        }
    }

    /**
     * @return array usercontroll  Uer
     */
    public function getOrderById(){
        $user=session()->get('user_login');
        return $this->order->where('user_id',$user['user_id'])->orderBy('order_date','desc')->findAll();
    }
    /**
     * @return array usercontroll   user
     */
    public function getOrderDetailByIdOder(){
        return $this->orderdetail
            ->join('tbl_product','tbl_order_detail.product_id = tbl_product.product_id')
            ->join('tbl_classify','tbl_classify.classify_id = tbl_order_detail.classify_id')
            ->findAll();
    }
    public function getOrderStatus($requestData){
        $data=$requestData->getPost();
        $user=session()->get('user_login');
        if($data['order_method']==5){
            $order=$this->order->where('user_id',$user['user_id'])->orderBy('order_date','desc')->findAll();
        }else{
            $order=$this->order->where('user_id',$user['user_id'])->where('order_status',$data['order_method'])->orderBy('order_date','desc')->findAll();
        }
        $order_detail=$this->orderdetail->join('tbl_product','tbl_order_detail.product_id = tbl_product.product_id')
            ->join('tbl_classify','tbl_classify.classify_id = tbl_order_detail.classify_id')->findAll();
        $output='';
                   $output.='<fieldset>';
                             foreach ($order as $item ) {
                           $output.=' <table class="data-table cart-table" id="shopping-cart-table">
                                <thead>
                                <tr class="first last">
                                    <th rowspan="1">'.$item['order_id'].'</th>
                                    <th rowspan="1"><span class="nobr">Thoong tin</span></th>
                                    <th class="a-center" rowspan="1">';
                                        if($item['order_status']==0){
                                            $output.='<label class="label label-danger"">Da huy</label>';
                                        }elseif($item['order_status']==1){
                                            $output.='<span class="label label-default">Cho xac nhan</span>';
                                        }elseif($item['order_status']==2){
                                            $output.='<span class="label label-warning">Cho lay hang</span>';
                                        }elseif($item['order_status']==3){
                                            $output.='<span class="label label-primary">Dang gia</span>';
                                        }else{
                                            $output.='<label class="label label-success">Da giao</label>';
                                        }
                                    $output.='</th>
                                </tr>
                                </thead>
                                <tbody>';
                                     foreach ($order_detail as $item_detail ) {
                                         if($item['order_id']==$item_detail['order_id']){
                                   $output.= '<tr class="first odd tr_cart">
                                        <td class="image"><img width="75" alt="Sample Product" src="uploads/product/'.$item_detail['product_image'].'"></td>
                                        <td class="a-right"><span class="cart-price"> <span class="price">
                                            '.$item_detail['product_name'].'<br>
                                            '.$item_detail['classify_type'].'- '.$item_detail['classify_value'].'<br>
                                            x'.$item_detail['order_detail_amount'].'
                                        </span> </span></td>
                                        <td class="a-right cart_product_total">
                                        <span class="cart-price">
                                            <span class="cart-price-total cart-price-product">
                                                '.$item_detail['product_price'].'
                                        </span> </span></td>
                                    </tr>';
                                         }
                                }
                                $output.='</tbody>
                                <tfoot>
                                <tr class="first last">';
                                    if($item['order_status']==0){
                                        $output.= ' <td class="a-right last" colspan="50"><span><span>Ngay huy: '.$item['order_date'].'</span></span>';
                                    }elseif($item['order_status']==4){
                                        $output.= ' <td class="a-right last" colspan="50"><span><span>Ngay nhan: '.$item['order_date'].'</span></span>';
                                    }else{
                                        $output.= ' <td class="a-right last" colspan="50"><span><span>Ngay Dat: '.$item['order_date'].'</span></span>';
                                    }
                                        if($item['order_status']==1){
                                            $output.= ' <button id="empty_cart_button" class="button btn-empty cancel_order" title="Clear Cart" value="'.$item['order_id'].'" name="update_cart_action" type="button"><span><span>Huy Don</span></span></button>';
                                        }elseif($item['order_status']==4 || $item['order_status']==0){
                                            $output.= ' <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span><span>Mua Lai</span></span></button>';
                                       }else{
                                            $output.= ' <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span><span>Da Nhan Hang</span></span></button>';
                                        }
                                    $output.='</td>
                                </tr>
                                </tfoot>
                            </table>';
                            }
                        $output.='</fieldset>';
                             echo $output;
    }

    public function cancelOrder($request){
        $data=$request->getPost();
        return $this->order->where('order_id',$data['order_id'])->set(['order_status'=>0])->update();
    }














    /**
     * add new user info
     */

    public function updateCategoryInfo($requestData){
        $validate = $this->validateEditCategory($requestData);
        //dd($requestData);
        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $dataSave=$requestData->getPost();
        // dd($dataSave);
        try{
            $this->category->save($dataSave);
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
    /**
     * Get User by id primary key
     */
    public  function deleteCategory($category_id){
        try{
            $this->category->where('category_id',$category_id)->delete();
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
