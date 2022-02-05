<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\ImportModel;
use App\Models\ImportDetailModel;
use App\Models\VillageModel;
use App\Models\WarehouseModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\CartModel;

class ImportService extends BaseService
{
    private $import;
    private $importdetail;
    private $warehouse;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->import=new ImportModel();
        $this->import->protect(false);
        $this->importdetail=new ImportDetailModel();
        $this->importdetail->protect(false);
        $this->warehouse=new WarehouseModel();
        $this->warehouse->protect(false);

    }
    /**
     * add new user info
     */
    public function addImportInfo($requestData){
        $admin=session()->get('admin_login');
        $dataSave = $requestData->getPost();
        //dd($dataSave);
    // dd($dataSave);
        try{
            $dataImport=[
            'import_date'=>date('Y-m-d H:i:s'),
            'admin_id'=>$admin['admin_id'],
            'provider_id'=>$dataSave['provider_id'],
            'import_cost'=>$dataSave['import_cost'],
            'import_note'=>$dataSave['import_note'],
        ];
        //dd($dataImport);
            /// IMPORT DEtail
          $this->import->save($dataImport);
        $import=$this->import->selectMax('import_id')->first();
        foreach ($dataSave['product_id'] as $key => $item){
            $dataImportDetail=[
                'import_detail_id'=>$import['import_id'],
                'product_id'=>$dataSave['product_id'][$key],
                'import_detail_price'=>$dataSave['price'][$key],
                'import_detail_amount'=>$dataSave['amount'][$key],
            ];
            $this->importdetail->save($dataImportDetail);
        }
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
    public function getAllImport(){
        return $this->import->join('tbl_import_detail','tbl_import_detail.import_detail_id = tbl_import.import_id')
            ->select('import_id,import_date,provider_id,import_status,count(import_id) as import_number,sum(import_detail_amount) as import_total_amount,sum(import_detail_price*import_detail_amount)+import_cost as import_total_price')
            ->groupBy('import_id')
            ->findAll();
    }
    public function updateImportStatus($id){

        try{
            $import=$this->import->where('import_id',$id)
                ->join('tbl_import_detail','tbl_import_detail.import_detail_id = tbl_import.import_id')
                ->findAll();
            $import_2=$this->import->where('import_id',$id)
                ->set(['import_status'=>$import[0]['import_status']+1,'import_date'=>date('Y-m-d H:i:s')])->update();
            //dd($import);
            $warehouse=$this->warehouse->where('warehouse_year',date('Y'))
                ->where('warehouse_month',date('m'))->findAll();
            if($warehouse){
                foreach ($import as $item_import){
                    foreach ($warehouse as $item_warehouse){
                        if($item_import['product_id']==$item_warehouse['product_id']   ){
                            $ware=  $this->warehouse->where('product_id',$item_import['product_id'])
                                ->where('warehouse_year',date('Y'))
                                ->where('warehouse_month',date('m'))
                                ->first();
                            $this->warehouse->where('product_id',$item_import['product_id'])
                                ->where('warehouse_year',date('Y'))
                                ->where('warehouse_month',date('m'))
                                ->set(['warehouse_sum_import'=>$ware['warehouse_sum_import']+$item_import['import_detail_amount']
                                ,'warehouse_sum_inventory'=>$ware['warehouse_sum_inventory']+$item_import['import_detail_amount']])
                                ->update();
                        }
                    }
                }
            }else{
                foreach ($import as $item_import)
                $dataWarehouse=[
                    'warehouse_month'=>date('m'),
                    'warehouse_year'=>date('Y'),
                    'product_id'=>$item_import['product_id'],
                    'warehouse_sum_import'=>$item_import['import_detail_amount'],
                    'warehouse_sum_inventory'=>$item_import['import_detail_amount'],
                ];
                $this->warehouse->save($dataWarehouse);
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



}
