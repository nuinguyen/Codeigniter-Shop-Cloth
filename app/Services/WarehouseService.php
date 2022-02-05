<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\ImportModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\ProductModel;
use App\Models\WarehouseModel;


class WarehouseService extends BaseService
{
    private $warehouse;
    private $import;

    function __construct()
    {
        parent::__construct();
        $this->warehouse=new WarehouseModel();
        $this->warehouse->protect(false);
        $this->import=new ImportModel();
        $this->import->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllWarehouse()
    {
        return $this->warehouse
            ->join('tbl_product','tbl_warehouse.product_id = tbl_product.product_id')
            ->select('tbl_warehouse.product_id,product_name,sum(warehouse_sum_import) as warehouse_import,sum(warehouse_sum_inventory) as warehouse_inventory')
            ->groupBy('tbl_warehouse.product_id')
            ->findAll();
    }
    public function getImportByWarehouse(){
        return $this->import
            ->join('tbl_import_detail','tbl_import_detail.import_detail_id = tbl_import.import_id')
            ->where('import_status',0)
            ->select('product_id,sum(import_detail_amount) as import_amount')
            ->groupBy('product_id')
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
