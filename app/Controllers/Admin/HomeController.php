<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data=[];
        $data = $this->LoadMasterLayout($data,'Trang chu','admin/pages/home');
        return view('admin/main',$data);
    }
}
