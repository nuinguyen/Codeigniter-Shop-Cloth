<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\ProviderModel;

class ProviderService extends BaseService
{
    private $provider;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->provider=new ProviderModel();
        $this->provider->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllProvider()
    {
        return $this->provider->findAll();
    }
    /**
     * add new user info
     */
    public function addProviderInfo($requestData){
//        $validate = $this->validateAddProduct($requestData);
//
//        if($validate->getErrors()){
//            return [
//                'status' =>  ResultUtils::STATUS_CODE_ERR,
//                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
//                'message'=> $validate->getErrors()
//            ];
//        }
        $dataSave = $requestData->getPost();
        $get_images=$requestData->getFiles();

        $get_images['provider_image']->move('uploads/provider',$get_images['provider_image']->getName());
        $dataSave['provider_image']=$get_images['provider_image']->getName();
        //dd($dataSave);

        try{
            $this->provider->save($dataSave);
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
    public  function getProviderByID($idProvider){
        return $this->provider->where('provider_id',$idProvider)->first();
    }

    public function updateProviderInfo($requestData,$id){
//        $validate = $this->validateEditProducer($requestData);
//        //dd($requestData);
//        if($validate->getErrors()){
//            return [
//                'status' =>  ResultUtils::STATUS_CODE_ERR,
//                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
//                'message'=> $validate->getErrors()
//            ];
//        }
        $dataSave=$requestData->getPost();
        $dataSave['provider_id']=$id;
//        dd($dataSave);

        $get_images=$requestData->getFiles();

        if($get_images['provider_image']->getName()!=""){
            $get_images['provider_image']->move('uploads/provider',$get_images['provider_image']->getName());
            $dataSave['provider_image']=$get_images['provider_image']->getName();
        }
        try{
            $this->provider->save($dataSave);
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
    private  function validateEditProducer($requestData){
//        dd($requestData->getPost('user_id'));
        $rule=[
            'producer_name' => 'max_length[100]',

        ];
        $message=[
            'producer_name'=>[
                'max_length' =>' ten qua dai'
            ],

        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

}
