<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\CategoryModel;

class CategoryService extends BaseService
{
    private $category;
    /*
    Construct 
    */
    function __construct()
    {
      parent::__construct();
      $this->category=new CategoryModel();
      $this->category->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllCategory()
    {
        return $this->category->findAll();
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
