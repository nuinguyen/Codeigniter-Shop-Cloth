<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ClassifyService;
use App\Services\ProductService;
use App\Services\WarehouseService;



class WarehouseController extends BaseController
{
    /**
     *  @var Service
     */
    private $warhousee;

    public function __construct(){
        $this->warhousee=new WarehouseService();


    }
    public function list()
    {
        $dataLayout['warehouse']=$this->warhousee->getAllWarehouse();
        $dataLayout['import']=$this->warhousee->getImportByWarehouse();
        $data = $this->LoadMasterLayout([],'DS Product','admin/pages/warehouse/list',$dataLayout);
        return view('admin/main',$data);
    }






    public function add(){
        $data=[];
        $dataLayout['category']=$this->category->getAllCategory();
        $dataLayout['classify']=$this->classify->getAllClassify();
        $data = $this->LoadMasterLayout($data,'Them Pro','admin/pages/product/add',$dataLayout);
        return view('admin/main',$data);
    }
    public function create(){

        $result=$this->product->addProductInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
    }
    /**
     * Get User by id primary key
     */
    public  function getProductByID($id){
        return $this->product->where('product_id',$id)->first();
    }

}
