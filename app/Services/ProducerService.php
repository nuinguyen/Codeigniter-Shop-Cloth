<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\ProducerModel;

class ProducerService extends BaseService
{
    private $producer;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->producer=new ProducerModel();
        $this->producer->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllProducer()
    {
        return $this->producer->findAll();
    }
    /**
     * add new user info
     */
    public function addProducerInfo($requestData){
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

        $get_images['producer_image']->move('uploads/producer',$get_images['producer_image']->getName());
        $dataSave['producer_image']=$get_images['producer_image']->getName();
        //dd($dataSave);

        try{
            $this->producer->save($dataSave);
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
    public  function getProducerByID($idProducer){
        return $this->producer->where('producer_id',$idProducer)->first();
    }

    public function updateProducerInfo($requestData,$id){
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
        $dataSave['producer_id']=$id;
        $get_images=$requestData->getFiles();
        $get_images['producer_image']->move('uploads/producer',$get_images['producer_image']->getName());
        $dataSave['producer_image']=$get_images['producer_image']->getName();
//        dd($dataSave);
        try{
            $this->producer->save($dataSave);
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
