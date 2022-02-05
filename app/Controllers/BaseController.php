<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }


//  set data
public function LoadMasterLayout($data,$title,$content,$dataLayout=[]){
    $data['title']=$title; 
    $data['left_menu']= view('admin/layout/left_menu'); 
    $data['header']= view('admin/layout/header'); 
    $data['footer']= view('admin/layout/footer'); 
    $data['content']= view($content,$dataLayout);
    return $data;
}
    public function LoadUserLayout($data,$dataHeader=[],$dataNavbar=[],$title,$content,$dataLayout=[]){
        $data['title']=$title;
        $data['header']= view('pages/layout/header',$dataHeader);
        $data['navbar']= view('pages/layout/navbar',$dataNavbar);
        $data['footer']= view('pages/layout/footer');
        $data['help']= view('pages/layout/help');
        $data['content']= view($content,$dataLayout);
        return $data;
    }

}
