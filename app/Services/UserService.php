<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Common\ResultUtils;
use CodeIgniter\Model;
use PHPUnit\Exception;

class UserService extends BaseService
{
    private $user;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->user=new UserModel();
        $this->user->protect(false);
    }
    public  function CheckoutIdUser(){
        $user_id_cart=session()->get('user_login');
        return $this->user->where('user_id',$user_id_cart['user_id'])->first();
    }

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
        $user_detail=$this->user->where('user_email',$data['user_email'])->first();
        if(!$user_detail){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> [
                    'notExist' => 'Email chuwa dduwojc ddawng kys'
                ]
            ];
        }
        if(!password_verify($data['user_password'],$user_detail['user_password'])){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> [
                    'wrongPass' => 'Mat Khau khoong dung'
                ]
            ];
        }
        $session= session();
        unset($user_detail['user_password']);
        $session->set('user_login',$user_detail);
        return [
            'status' =>  ResultUtils::STATUS_CODE_OK,
            'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
            'message'=> null
        ];
    }
    public function LogoutUser(){
        $session= session();
        $session->remove('user_login');
    }
    public function validationLogin($requestData){
        $rule= [
            'user_email' =>  'valid_email',
            'user_password' => 'max_length[30]|min_length[3]',
        ];
        $message=[
            'user_email'=>[
                'valid_email'=>'Ko dung email',
            ],
            'user_password'=>[
                'max_length' =>' pass qua dai',
                'min_length' =>' pass qua ngan'
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    /////////////////REGISTER
    public function addUserInfo($requestData){
        $validate = $this->validateAddUser($requestData);
        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $dataSave = $requestData->getPost();
        unset($dataSave['user_cf_password']);
        $dataSave['user_password']=password_hash($dataSave['user_password'],PASSWORD_BCRYPT);
        try{
            $this->user->save($dataSave);
            return [
                'status' =>  ResultUtils::STATUS_CODE_OK,
                'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
                'message'=> ['success' =>'Dang Ky thanh cong thanh cong']
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
            'user_name' => 'max_length[200]|min_length[3]',
            'user_email' => 'valid_email|is_unique[tbl_user.user_email]',
            'user_password' => 'max_length[30]|min_length[3]',
            'user_cf_password' => 'matches[user_password]',
        ];
        $message=[
            'user_name'=>[
                'max_length' =>' ten qua dai',
                'min_length' =>' ten qua ngan'
            ],
            'user_email'=>[
                'valid_email'=>'Ko dung dia chi email',
                'is_unique' => 'email da su dung'
            ],
            'user_password'=>[
                'max_length' =>' mk qua dai',
                'min_length' =>' mk qua ngan'
            ],
            'user_cf_password'=>[
                'matches' =>'ko khop'
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

}
