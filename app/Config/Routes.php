<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Filters\AuthFilter;

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//   HOME
$routes->get('/', 'User\HomeController::index');

// SUCCESS

$routes->get('success', 'User\HomeController::success');

// LOGIN
$routes->get('login', 'User\UserController::index');
$routes->post('login', 'User\UserController::login');
$routes->get('logout', 'User\UserController::logout');

//  Register

$routes->get('register', 'User\UserController::index_register');
$routes->post('register', 'User\UserController::register');

// Customer

$routes->post('cancel-order', 'User\CustomerController::cancel_order');
$routes->get('my-order', 'User\CustomerController::my_order');
$routes->post('ajax-order-status', 'User\CustomerController::ajax_order_status');




// CATEGORY
$routes->get('category/(:num)', 'User\CategoryController::category/$1');

//     PRODUCT_DETAIL
$routes->get('product-detail/(:num)', 'User\ProductDetailController::product_detail/$1');

//     Cart
$routes->get('cart', 'User\CartController::cart');
$routes->post('add-cart', 'User\CartController::add_cart');
$routes->get('delete-cart/(:num)', 'User\CartController::delete_cart/$1');
$routes->post('update-amount-cart', 'User\CartController::update_amount_cart');

//    CHECK OUT
$routes->post('checkout', 'User\CheckoutController::checkout');
$routes->post('ajax_address', 'User\CheckoutController::ajax_address');
$routes->post('ajax_calculate_fee', 'User\CheckoutController::ajax_calculate_fee');

//  PURCHASE
$routes->post('purchase', 'User\CheckoutController::purchase');

//   ERROR
$routes->get('error/404',function(){
   return view('error/html/error_404');
});

//   USER
//$routes->get('/', 'User\HomeController::index');


//   ADMIN
$routes->get('admin-login', 'Admin\LoginController::index');
$routes->post('admin-login', 'Admin\LoginController::login');
$routes->group('admin',['filter'=>'adminFilter'],function($routes){
    $routes->get('home', 'Admin\HomeController::index');
    $routes->get('logout', 'Admin\LoginController::logout');

    $routes->group('user',function($routes){
        $routes->get('list', 'Admin\AdminController::list');
        $routes->get('add', 'Admin\AdminController::add');
        $routes->post('create', 'Admin\AdminController::create');
        $routes->get('edit/(:num)', 'Admin\AdminController::edit/$1');
        $routes->get('delete/(:num)', 'Admin\AdminController::delete/$1');
        $routes->post('update', 'Admin\AdminController::update');
    });
    $routes->group('category',function($routes){
        $routes->get('list', 'Admin\CategoryController::list');
        $routes->get('add', 'Admin\CategoryController::add');
        $routes->post('create', 'Admin\CategoryController::create');
        $routes->get('edit/(:num)', 'Admin\CategoryController::edit/$1');
        $routes->get('delete/(:num)', 'Admin\CategoryController::delete/$1');
        $routes->post('update', 'Admin\CategoryController::update');
    });
    $routes->group('classify',function($routes){
        $routes->get('classify', 'Admin\ClassifyController::classify');
//        $routes->get('add', 'Admin\CategoryController::add');
        $routes->post('create', 'Admin\ClassifyController::create');
        $routes->get('edit/(:num)', 'Admin\ClassifyController::edit/$1');
//        $routes->get('delete/(:num)', 'Admin\CategoryController::delete/$1');
        $routes->post('update/(:num)', 'Admin\ClassifyController::update/$1');
    });
    $routes->group('producer',function($routes){
        $routes->get('producer', 'Admin\ProducerController::producer');
        $routes->post('create', 'Admin\ProducerController::create');
        $routes->get('edit/(:num)', 'Admin\ProducerController::edit/$1');
//        $routes->get('delete/(:num)', 'Admin\CategoryController::delete/$1');
        $routes->post('update/(:num)', 'Admin\ProducerController::update/$1');
    });
    $routes->group('provider',function($routes){
        $routes->get('provider', 'Admin\ProviderController::provider');
        $routes->post('create', 'Admin\ProviderController::create');
        $routes->get('edit/(:num)', 'Admin\ProviderController::edit/$1');
//        $routes->get('delete/(:num)', 'Admin\ProviderController::delete/$1');
        $routes->post('update/(:num)', 'Admin\ProviderController::update/$1');
    });
    $routes->group('product',function($routes){
        $routes->get('list', 'Admin\ProductController::list');
        $routes->get('add', 'Admin\ProductController::add');
        $routes->post('create', 'Admin\ProductController::create');
        $routes->get('edit/(:num)', 'Admin\ProductController::edit/$1');
//        $routes->get('delete/(:num)', 'Admin\CategoryController::delete/$1');
        $routes->post('update/(:num)', 'Admin\ProductController::update/$1');
    });
    $routes->group('shipping',function($routes){
        $routes->get('fee', 'Admin\ShippingController::fee');
        $routes->post('create', 'Admin\ShippingController::create');
        $routes->post('ajaxupdatefee', 'Admin\ShippingController::ajaxupdatefee');
    });
    $routes->group('customer',function($routes){
        $routes->get('order', 'Admin\CustomerController::order');
        $routes->get('view/(:num)', 'Admin\CustomerController::view/$1');
        $routes->get('move/(:num)', 'Admin\CustomerController::move/$1');
    });
    $routes->group('manage',function($routes){
        $routes->get('add', 'Admin\ImportController::add');
        $routes->post('create', 'Admin\ImportController::create');
        $routes->get('list', 'Admin\ImportController::list');
        $routes->get('move/(:num)', 'Admin\ImportController::move/$1');
    });
    $routes->group('warehouse',function($routes){
        $routes->get('list', 'Admin\WarehouseController::list');
    });
});




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
