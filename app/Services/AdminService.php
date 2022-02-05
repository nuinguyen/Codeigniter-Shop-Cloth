<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Common\ResultUtils;
use PHPUnit\Exception;

class AdminService extends BaseService
{
    private $users;
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
    public function getAllUsers()
    {
        return $this->admin->findAll();
    }
    /**
     * add new user info
     */
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
        unset($dataSave['admin_cf_password']);
        $dataSave['admin_password']=password_hash($dataSave['admin_password'],PASSWORD_BCRYPT);
        try{
            $this->admin->save($dataSave);
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
    public function updateUserInfo($requestData){
        $validate = $this->validateEditUser($requestData);
        //dd($requestData);
        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $dataSave=$requestData->getPost();
        if(!empty($dataSave['change_password'])) {
            unset($dataSave['change_password']);
            unset($dataSave['admin_cf_password']);
            $dataSave['admin_password']=password_hash($dataSave['admin_password'],PASSWORD_BCRYPT);
        }
        else{
            unset($dataSave['admin_password']);
            unset($dataSave['admin_cf_password']);
        }
       dd($dataSave);
        try{
            $this->admin->save($dataSave);
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
    public  function getUserByID($admin_id){
        return $this->admin->where('admin_id',$admin_id)->first();
    }
    /**
     * Get User by id primary key
     */
    public  function deleteUser($admin_id){
        try{
            $this->admin->where('admin_id',$admin_id)->delete();
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
            'admin_email' => 'valid_email|is_unique[tbl_admin.admin_email]',
            'admin_name' => 'max_length[200]',
            'admin_password' => 'max_length[30]|min_length[3]',
            'admin_cf_password' => 'matches[user_password]',
        ];
        $message=[
            'admin_email'=>[
              'valid_email'=>'Ko ddung dang',
              'is_unique' => 'email da su dung'
            ],
            'admin_name'=>[
              'max_length' =>' ten qua dai'
            ],
            'admin_password'=>[
                'max_length' =>' mk qua dai',
                'min_length' =>' mk qua ngan'
            ],
            'admin_cf_password'=>[
                'matches' =>'ko khop'
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
    private  function validateEditUser($requestData){
        $rule=[
            'admin_email' => 'valid_email|is_unique[tbl_admin.admin_email,admin_id,'.$requestData->getPost()['admin_id'].']',
            'admin_name' => 'max_length[100]',

        ];
        $message=[
            'admin_email'=>[
                'valid_email'=>'Ko ddung dang',
                'is_unique' => 'email da su dung'
            ],
            'admin_name'=>[
                'max_length' =>' ten qua dai'
            ],

        ];

        if(!empty($requestData->getPost()['change_password'])){
            $rule['admin_password']='max_length[30]|min_length[3]';
            $rule['admin_cf_password']='matches[admin_password]';
           $message['admin_password']=[
                'max_length' =>' mk qua dai',
                'min_length' =>' mk qua ngan'
            ];
           $message['admin_cf_password']=[
                'matches' =>'ko khop mk nha'
            ];
        }
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
}
