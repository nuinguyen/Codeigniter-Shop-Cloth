<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\ProductClassifyModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\CategoryModel;

class ProductClassifyService extends BaseService
{
    private $productclassify;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->productclassify=new ProductClassifyModel();
        $this->productclassify->protect(false);
    }
    /**
     * Get all data users
     */
    public function getProductClassify($product_id)
    {
        return $this->productclassify ->join('tbl_classify','tbl_classify.classify_id = tbl_product_classify.classify_id')
            ->where('product_id',$product_id)
            ->findAll();
    }










    /**
     * add new user info
     */
    public function addCategoryInfo($requestData){
        $validate = $this->validateAddUser($requestData);

        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $dataSave = $requestData->getPost();
        try{
            $this->category->save($dataSave);
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
    public  function getCategoryByID($idCategory){
        return $this->category->where('category_id',$idCategory)->first();
    }
    /**
     * Get User by id primary key
     */


}
