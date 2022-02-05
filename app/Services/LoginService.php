<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\AdminModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\UserModel;



class LoginService extends BaseService
{
    private $admin;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->admin=new AdminModel();
        $this->admin->protect(false);
    }
    /**
     * Get all data users
     */
    public function HasLogin($requestData){
        $validate=$this->validationLogin($requestData);
        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $data=$requestData->getPost();
        $admin_detail=$this->admin->where('admin_email',$data['admin_email'])->first();
        if(!$admin_detail){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> [
                    'notExist' => 'Email chuwa dduwojc ddawng kys'
                ]
            ];
        }
        if(!password_verify($data['admin_password'],$admin_detail['admin_password'])){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> [
                    'wrongPass' => 'Mat Khau khoong dung'
                ]
            ];
        }
        $session= session();
        unset($admin_detail['admin_password']);
        $session->set('admin_login',$admin_detail);
        return [
            'status' =>  ResultUtils::STATUS_CODE_OK,
            'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
            'message'=> null
        ];
    }
    public function LogoutUser($reauest){
        $session= session();
        $session->remove('admin_login');

    }
    public function validationLogin($requestData){
        $rule= [
            'admin_email' =>  'valid_email',
            'admin_password' => 'max_length[30]|min_length[3]',
               ];
        $message=[
            'admin_email'=>[
                'valid_email'=>'Ko dung email',
            ],
            'admin_password'=>[
                'max_length' =>' pass qua dai',
                'min_length' =>' pass qua ngan'
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

}
