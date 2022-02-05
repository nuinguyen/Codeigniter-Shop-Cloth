<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\CityModel;
use App\Models\DistrictModel;
use App\Models\VillageModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\CartModel;

class AddressService extends BaseService
{
    private $city;
    private $district;
    private $village;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->city=new CityModel();
        $this->city->protect(false);
        $this->district=new DistrictModel();
        $this->district->protect(false);
        $this->village=new VillageModel();
        $this->village->protect(false);
    }
    /**
     * Get all data users
     */
    public function getAllCity()
    {
        return $this->city->findAll();
    }
    public function getAllDistrict()
    {
        return $this->district->findAll();
    }
    public function getAllVillage()
    {
        return $this->village->findAll();
    }
    /**
     * add new user info
     */
    public function checkAddress($requetData){
        $data=$requetData->getPost();
       // dd($data['action']);
//        if($data['action']){
        $output = '';
        if($data['action']=="city"){
            $select_district = $this->district->where('city_id',$data['ma_id'])->findAll();
            //dd($select_district);
            $output.='<option>Chọn quận huyện</option>';
            foreach($select_district as  $district){
                $output.='<option value="'.$district['district_id'].'">'.$district['district_name'].'</option>';
            }
        }else{
            $select_village = $this->village->where('district_id',$data['ma_id'])->findAll();
            $output.='<option>Chọn xã phường</option>';
            foreach($select_village as $key => $village){
                $output.='<option value="'.$village['village_id'].'">'.$village['village_name'].'</option>';
            }
        }
        echo $output;
//        }
    }



}
