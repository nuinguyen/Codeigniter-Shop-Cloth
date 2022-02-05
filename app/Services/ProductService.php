<?php
namespace App\Services;
use App\Controllers\BaseController;
use App\Common\ResultUtils;
use App\Models\AlbumModel;
use App\Models\ClassifyModel;
use App\Models\ProductClassifyModel;
use CodeIgniter\Model;
use PHPUnit\Exception;
use App\Models\ProductModel;
use App\Models\CategoryModel;


class ProductService extends BaseService
{
    private $product;
    private $productclassify;
    private $classify;
    private $album;
    /*
    Construct
    */
    function __construct()
    {
        parent::__construct();
        $this->product=new ProductModel();
        $this->product->protect(false);
        $this->productclassify=new ProductClassifyModel();
        $this->productclassify->protect(false);
        $this->classify=new ClassifyModel();
        $this->classify->protect(false);
        $this->album=new AlbumModel();
        $this->album->protect(false);
    }
    /**
     *  getRamdomProduct Ram dom san pham bat ky
     */
    public function getRamdomProduct(){
        $count=$this->product->countAll('product_id');
        return $this->product->orderBy(rand(0,$count))->paginate(4) ;
    }
    /**
     *  getRamdomProduct Ram dom san pham bat ky
     */
    public function getProductAlbum($id){
        return $this->album->where('product_id',$id)->findAll();
    }
    /**
     * Get all data users
     */
    public function getAllProduct()
    {
        return $this->product->join('tbl_category','tbl_category.category_id = tbl_product.category_id')->findAll();
    }
    /**
     * product theo category
     */
    public function getProductByCategory($category_id){
        return $this->product->join('tbl_category','tbl_category.category_id = tbl_product.category_id')
            ->where('tbl_product.category_id',$category_id)->findAll();
    }
    /**
     * add new user info
     */
    public function addProductInfo($requestData){
        $validate = $this->validateAddUser($requestData);

        if($validate->getErrors()){
            return [
                'status' =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
                'message'=> $validate->getErrors()
            ];
        }
        $dataSave = $requestData->getPost();
        //dd($dataSave);
        $get_images=$requestData->getFiles();
           // dd($get_images['product_image']);
        // $get_image = $dataSave['product_image'];
//        $dataSave['product_image']=$get_image->getName();
        $get_images['product_image']->move('uploads/product',$get_images['product_image']->getName());
        $dataProduct=[
            'category_id'=>$dataSave['category_id'],
            'provider_id'=>$dataSave['provider_id'],
            'producer_id'=>$dataSave['producer_id'],
            'product_name'=>$dataSave['product_name'],
            'product_slug'=>$dataSave['product_slug'],
            'product_image'=>$get_images['product_image']->getName(),
            'product_price'=>$dataSave['product_price'],
            'product_summary'=>$dataSave['product_summary'],
            'product_desc'=>$dataSave['product_desc'],
            'product_status'=>$dataSave['product_status'],
        ];
        $this->product->save($dataProduct);
        // ALBUM
        $product_id=$this->product->selectMax('product_id')->first();
        //dd($get_images['product_images']);
        foreach ($get_images['product_images'] as $item){
//            $dataSave['product_image']=$get_image->getName();
            $item->move('uploads/album',$item->getName());
            $dataAlbum=[
                  'product_id'=>$product_id['product_id'],
                'album_image'=>$item->getName(),
            ];
            $this->album->save($dataAlbum);
        }

        // Clasify_product
        $product_classify=$this->classify->whereIn('classify_id',$dataSave['classify_id'])->findAll();
        foreach ($product_classify as $pro_class){
            $dataProductClassify=[
                'product_id'=>$product_id['product_id'],
                'classify_id'=>$pro_class['classify_id'],
            ];
            $this->productclassify->save($dataProductClassify);
        }
        //dd($dataSave['product_image']);

        try{
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
    public function updateProductInfo($requestData,$id){
//        $validate = $this->validateEditCategory($requestData);
//        //dd($requestData);
//        if($validate->getErrors()){
//            return [
//                'status' =>  ResultUtils::STATUS_CODE_ERR,
//                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
//                'message'=> $validate->getErrors()
//            ];
//        }


        $dataSave=$requestData->getPost();
        $get_images=$requestData->getFiles();

//        $product_classify=$this->classify->whereIn('classify_id',$dataSave['classify_id'])->findAll();
//
////        $this->productclassify->where('product_id',$id)->delete();
//        foreach ($product_classify as $pro_class){
//            $dataProductClassify=[
//                'product_id'=>$id,
//                'classify_id'=>$pro_class['classify_id'],
//            ];
////            $this->productclassify->save($dataProductClassify);
//        }
        unset($dataSave['classify_id']);
        $dataSave['product_id']=$id;

         //dd($get_images['product_image']);
        // $get_image = $dataSave['product_image'];
//        $dataSave['product_image']=$get_image->getName();
        if($get_images['product_image']!=""){
            $get_images['product_image']->move('uploads/product',$get_images['product_image']->getName());
            $dataSave['product_image']=$get_images['product_image']->getName();
        }
        $this->product->save($dataSave);

        if ($get_images['product_images'][0]->getName()!=""){
            $this->album->where('product_id',$id)->delete();
            foreach ($get_images['product_images'] as $item){
                $item->move('uploads/album',$item->getName());
                $dataAlbum=[
                    'product_id'=>$id,
                    'album_image'=>$item->getName(),
                ];
                $this->album->save($dataAlbum);
            }
        }

        try{
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

//->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
    /**
     * Get User by id primary key
     */
    public  function getProductByID($id){
         return$this->product->where('tbl_product.product_id',$id)
            ->first();
    }
    public function getProductClassify($id){
        $o= $this->product->where('tbl_product.product_id',$id)
            ->join('tbl_product_classify','tbl_product_classify.product_id = tbl_product.product_id')
            ->findAll();
        $arrIdClassify = [];
        foreach ($o as  $value) {
            $arrIdClassify[] = $value['classify_id'];
        }
        return $arrIdClassify;
    }
    /**
     * Get User by id primary key
     */
    public  function getRelatedProduct($id){
        $product_detail=$this->product->where('product_id',$id)->first();
        return $this->product->where('category_id',$product_detail['category_id'])->whereNotIn('product_id',[$id])->findAll();
    }
    /**
     * Get User by id primary key
     */
//    public  function deleteCategory($category_id){
//        try{
//            $this->category->where('category_id',$category_id)->delete();
//            return [
//                'status' =>  ResultUtils::STATUS_CODE_OK,
//                'messageCode' =>ResultUtils::MESSAGE_CODE_OK,
//                'message'=> ['success' =>'xoa du lieu thanh cong']
//            ];
//        }catch (Exception $e){
//            return [
//                'status' =>  ResultUtils::STATUS_CODE_ERR,
//                'messageCode' =>ResultUtils::MESSAGE_CODE_ERR,
//                'message'=> ['success' => $e->getMessage()]
//            ];
//        }
//    }
    private  function validateAddUser($requestData){
        $rule=[
            'product_name' => 'max_length[200]',

        ];
        $message=[
            'product_name'=>[
                'max_length'=>'Qua ngan',
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
//    private  function validateEditCategory($requestData){
////        dd($requestData->getPost('user_id'));
//        $rule=[
//            'category_name' => 'max_length[100]',
//
//        ];
//        $message=[
//            'category_name'=>[
//                'max_length' =>' ten qua dai'
//            ],
//
//        ];
//
//        $this->validation->setRules($rule,$message);
//        $this->validation->withRequest($requestData)->run();
//        return $this->validation;
//    }

}
