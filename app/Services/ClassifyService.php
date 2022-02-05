<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\ClassifyModel;

class ClassifyService extends BaseService
{
    private $classify;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->classify=new ClassifyModel();
        $this->classify->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllClassify()
    {
        return $this->classify->findAll();
    }
    /**
     * add new user info
     */
    public function addClassifyInfo($requestData){
        $validate = $this->validateAddClassify($requestData);

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
            $this->classify->save($dataSave);
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
    public  function getClassifyByID($idClassify){
        return $this->classify->where('classify_id',$idClassify)->first();
    }

    public function updateClassifyInfo($requestData,$id){
        $validate = $this->validateEditClassify($requestData);
        //dd($requestData);
        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $dataSave=$requestData->getPost();
        $dataSave['classify_id']=$id;
        try{
            $this->classify->save($dataSave);
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
     * Get all data users
     */







    /**
     * Get User by id primary key
     */
    public  function getCategoryByID($idCategory){
        return $this->category->where('category_id',$idCategory)->first();
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
    private  function validateAddClassify($requestData){
        $rule=[
            'classify_type' => 'max_length[200]',

        ];
        $message=[
            'classify_type'=>[
                'max_length'=>'Qua ngan',
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
    private  function validateEditClassify($requestData){
//        dd($requestData->getPost('user_id'));
        $rule=[
            'classify_type' => 'max_length[100]',

        ];
        $message=[
            'classify_type'=>[
                'max_length' =>' ten qua dai'
            ],

        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

}
