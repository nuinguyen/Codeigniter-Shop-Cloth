<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\ProductModel;
use App\Models\ShippingModel;


class ShippingService extends BaseService
{
    private $shipping;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->shipping=new ShippingModel();
        $this->shipping->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllShipping()
    {
        return $this->shipping
            ->join('tbl_city','tbl_city.city_id = tbl_shipping.city_id')
            ->join('tbl_district','tbl_district.district_id = tbl_shipping.district_id')
            ->join('tbl_village','tbl_village.village_id = tbl_shipping.village_id')
            ->findAll();
    }
    /**
     * add new user info
     */
    public function addFeeInfo($requestData){
        $validate = $this->validateAddFee($requestData);
        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $dataSave = $requestData->getPost();
        //dd($dataSave);
        try{
            $this->shipping->save($dataSave);
            return [
                'status' =>  ResultUtils::STATUS_CODE_OK,
                'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                'message'=> ['success' =>'Them dl thanh cong']
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
     * Get User by id primary key
     */
    public  function updateFee($requetData){
        $data=$requetData->getPost();
        //dd($data['shipping_id']);
        try{
            $this->shipping->where('shipping_id',$data['shipping_id'])->set(['shipping_fee'=> $data['fee_value']])->update();
            return [
                'status' =>  ResultUtils::STATUS_CODE_OK,
                'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                'message'=> ['success' =>'Cap nhat thanh cong']
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
     * Get User by id primary key
     */

    private  function validateAddFee($requestData){
        $rule=[
            'shipping_fee' => 'max_length[200]',

        ];
        $message=[
            'shipping_fee'=>[
                'max_length'=>'Qua ngan',
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
//////////////////////////USER
    public function calculateFee($requetData){
        $data=$requetData->getPost();
        $output='';
        $shipping_fee=$this->shipping->where('city_id',$data['city_id'])
            ->where('district_id',$data['district_id'])
            ->where('village_id',$data['village_id'])->first();
        if(empty($shipping_fee)){
            $shipping_fee['shipping_fee']=25000;
        }
        $output.='<span class="price">'.number_format($shipping_fee['shipping_fee'],0,',','.').' '.'VNĐ'.'</span>';
        echo $output;
    }
}
