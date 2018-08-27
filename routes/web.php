<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */


Auth::routes();
// orders
Route::group(['namespace' => 'FrontEnd'], function() {

    //home page
    Route::get('/orders', 'OrdersController@index')->name('orders.index');
    //
    // new order page
    Route::get('/neworder', 'OrdersController@newOrderPage')->name('orders.new');
    //
    // new order 
    Route::post('/neworder', 'OrdersController@order')->name('orders.new.post');

    // my orders page
    Route::get('/myoreders', 'OrdersController@orders')->name('orders.myoreders');
    //replay
    Route::get('replies/{id}', 'OrdersController@replies')->name('orders.replies');
    Route::post('reply/', 'OrdersController@reply')->name('orders.reply.post');
    // clinet products
    Route::get('/clinet_product', 'OrdersController@clinet_product')->name('orders.clinet_product');
    // new_product
    Route::get('/new_product', 'OrdersController@create')->name('orders.new_product');
    Route::post('/store', 'OrdersController@store')->name('orders.new_product.store');
    // delete product
    Route::get('/destroy/{id}', 'OrdersController@destroy')->name('orders.new_product.destroy');
      // my orders page
    Route::get('/mycoreders', 'OrdersController@corders')->name('orders.mycoreders');
       // my orders page user
    Route::get('/mycoreders_user', 'OrdersController@corders_user')->name('orders.mycoreders_user');
    //creplay 
    Route::get('creplies/{id}', 'OrdersController@creplies')->name('orders.creplies');
    Route::post('creply/', 'OrdersController@creply')->name('orders.creply.post');
    //notifications
     Route::get('notifications/', 'OrdersController@notification')->name('orders.notification');
     //close order
    Route::get('close/{id}', 'OrdersController@close')->name('orders.close');
    //order en
    //home page
    Route::get('/orders_en', 'OrdersEnController@index')->name('orders_en.index');
    //
    // new order page
    Route::get('/neworder_en', 'OrdersEnController@newOrderPage')->name('orders_en.new');
    //
    // new order 
    Route::post('/neworder_en', 'OrdersEnController@order')->name('orders_en.new.post');

    // my orders page
    Route::get('/myoreders_en', 'OrdersEnController@orders')->name('orders_en.myoreders');
    //replay
    Route::get('replies_en/{id}', 'OrdersEnController@replies')->name('orders_en.replies');
    Route::post('reply_en/', 'OrdersEnController@reply')->name('orders_en.reply.post');
       // clinet products
    Route::get('/clinet_product_en', 'OrdersEnController@clinet_product')->name('orders_en.clinet_product');
    // new_product
    Route::get('/new_product_en', 'OrdersEnController@create')->name('orders_en.new_product');
    Route::post('/store_en', 'OrdersEnController@store')->name('orders_en.new_product.store');
    // delete product
    Route::get('/destroy_en/{id}', 'OrdersEnController@destroy')->name('orders_en.new_product.destroy');
       // my orders page
    Route::get('/mycoreders_en', 'OrdersEnController@corders')->name('orders_en.mycoreders');
       // my orders page user
    Route::get('/mycoreders_user_en', 'OrdersEnController@corders_user')->name('orders_en.mycoreders_user');
    //creplay 
    Route::get('creplies_en/{id}', 'OrdersEnController@creplies')->name('orders_en.creplies');
    Route::post('creply_en/', 'OrdersEnController@creply')->name('orders_en.creply.post');
     //notifications
     Route::get('notifications_en/', 'OrdersEnController@notification')->name('orders_en.notification');
     
      //close order
    Route::get('close_en/{id}', 'OrdersENController@close')->name('orders_en.close');
});
// Ar

Route::group(['namespace' => 'FrontEnd'], function() {

    //home page
    Route::get('/', 'HomeController@index')->name('front.index');
    //about  page
    Route::get('about_us/', 'HomeController@about_us')->name('front.about_us');
    //services  page
    Route::get('services/', 'HomeController@services')->name('front.services');
    //works  page
    Route::get('works/', 'HomeController@works')->name('front.works');
    //works branch page
    Route::get('works/{id}', 'HomeController@works_branch')->name('front.works.branch');

    //work details page
    Route::get('work/{id}', 'HomeController@work_Details')->name('front.work.details');
    Route::post('work', 'HomeController@order')->name('front.work.order');
    // products 
      //products  page
    Route::get('products/', 'HomeController@products')->name('front.products');
    //products branch page
    Route::get('products_branch/{id}', 'HomeController@products_branch')->name('front.products.branch');
    //products details page
    Route::get('products/{id}', 'HomeController@product_Details')->name('front.product.details');
     // cproduct
      //cproduct  page
    Route::get('cproduct/', 'HomeController@cproducts')->name('front.cproducts');
        //cproduct details page
    Route::get('cproduct/{id}', 'HomeController@cproduct_Details')->name('front.cproduct.details');
    Route::get('cproduct_order', 'HomeController@cproduct_order')->name('front.cproduct.order');
    //bracnh page
   
    Route::get('branch/{id}', 'HomeController@branch')->name('front.branch');
    //news  page
    Route::get('news/', 'HomeController@news')->name('front.news');
    //news details page
    Route::get('news/{id}', 'HomeController@newsDetails')->name('front.news.details');
    //faq page
    Route::get('faq/', 'HomeController@faqs')->name('front.faqs');
    //term  page
    Route::get('term/', 'HomeController@conditions')->name('front.conditions');

    Route::get('/logout', 'HomeController@logout')->name('users.logout');
    //page contact

    Route::get('/contact', 'HomeController@contact')->name('front.contact');
    Route::post('/contact', 'HomeController@contact_post')->name('front.contact.post');

    //profile page
    Route::get('/profile', 'HomeController@profile')->name('front.profile');
    Route::post('/profile', 'HomeController@updateProfile')->name('front.profile.post');

    //orders page
    Route::get('porders/', 'HomeController@orders')->name('front.orders');
    //replies page
    Route::get('freplies/{id}', 'HomeController@replies')->name('front.replies');
    Route::post('freply/', 'HomeController@reply')->name('front.reply.post');
//email
    Route::post('email/', 'HomeController@email_list')->name('front.email');
    //password
    Route::get('/forget', 'HomeController@frogetPassword')->name('users.forget');
});
/// en 
Route::group(['namespace' => 'FrontEnd', 'prefix' => 'en'], function() {

    //home page
    Route::get('/', 'HomeEnController@index')->name('fronten.index');
    //about  page
    Route::get('about_us/', 'HomeEnController@about_us')->name('fronten.about_us');
    //services  page
    Route::get('services/', 'HomeEnController@services')->name('fronten.services');
    //works  page
    Route::get('works/', 'HomeEnController@works')->name('fronten.works');
    //works branch page
    Route::get('works/{id}', 'HomeEnController@works_branch')->name('fronten.works.branch');
    //work details page
    Route::get('work/{id}', 'HomeEnController@work_Details')->name('fronten.work.details');
    Route::post('work', 'HomeEnController@order')->name('fronten.work.order');
      // products 
      //products  page
    Route::get('products/', 'HomeEnController@products')->name('fronten.products');
         //cproduct details page
    Route::get('cproduct/{id}', 'HomeEnController@cproduct_Details')->name('fronten.cproduct.details');
    Route::post('cproduct_order', 'HomeEnController@cproduct_order')->name('fronten.cproduct.order');
    //products branch page
    Route::get('products_branch/{id}', 'HomeEnController@products_branch')->name('fronten.products.branch');

    //products details page
    Route::get('products/{id}', 'HomeEnController@product_Details')->name('fronten.product.details');
       //cproduct  page
    Route::get('cproduct/', 'HomeEnController@cproducts')->name('fronten.cproducts');
    //bracnh page
    Route::get('branch/{id}', 'HomeEnController@branch')->name('fronten.branch');
    //news  page
    Route::get('news/', 'HomeEnController@news')->name('fronten.news');
    //news details page
    Route::get('news/{id}', 'HomeEnController@newsDetails')->name('fronten.news.details');
    //faq page
    Route::get('faq/', 'HomeEnController@faqs')->name('fronten.faqs');
    //term  page
    Route::get('term/', 'HomeEnController@conditions')->name('fronten.conditions');

    Route::get('/logout', 'HomeEnController@logout')->name('usersen.logout');
    //page contact

    Route::get('/contact', 'HomeEnController@contact')->name('fronten.contact');
    Route::post('/contact', 'HomeEnController@contact_post')->name('fronten.contact.post');

    //profile page
    Route::get('/profile', 'HomeEnController@profile')->name('fronten.profile');
    Route::post('/profile', 'HomeEnController@updateProfile')->name('fronten.profile.post');

    //orders page
    Route::get('ordersh/', 'HomeEnController@orders')->name('fronten.orders');
    //
    Route::get('replies/{id}', 'HomeEnController@replies')->name('fronten.replies');
    Route::post('reply/', 'HomeEnController@reply')->name('fronten.reply.post');
    
     //password
    Route::get('/forgeten', 'HomeEnController@frogetPassword')->name('usersen.forget');
});
//loging/logout
Route::group(['prefix' => 'admin-cpx'], function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});
//admin route
Route::group(['prefix' => 'admin-cpx', 'namespace' => 'Admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    // change password
    Route::get('/changePassword', 'AdminController@changePassword')->name('admin.changePassword');
    Route::post('/changePass', 'AdminController@ChangePass')->name('admin.changePass');
    //setting
    Route::get('/setting', 'AdminController@setting')->name('admin.setting');
    Route::post('/setting', 'AdminController@updateSetting')->name('admin.setting.update');
    //home setting
    Route::get('/homesetting', 'HomeSettingController@setting')->name('admin.home.setting');
    Route::post('/homesetting', 'HomeSettingController@updateSetting')->name('admin.home.setting.update');
    //branch setting
    Route::get('/branchsetting', 'BranchSettingController@setting')->name('branch.home.setting');
    Route::post('/branchsetting', 'BranchSettingController@updateSetting')->name('branch.home.setting.update');
    //
    // orders
    Route::get('brorders/', 'AdminController@brorders')->name('subadmins.orders');
//log
    Route::get('admins/log', 'AdminController@log')->name('admins.log');
    //admins
    Route::get('/admins', 'AdminController@adminUsers')->name('admins.admins');
    Route::get('admins/create', 'AdminController@addAdmin')->name('admins.create');
    Route::post('admins/store', 'AdminController@store')->name('admins.store');
    Route::get('admins/destroy/{admin}', 'AdminController@destroy')->name('admins.destroy');
    Route::get('admins/edit/{admin}', 'AdminController@editAdmin')->name('admins.edit');
    Route::post('admins/update/{admin}', 'AdminController@update')->name('admins.update');


    //subadmins
    Route::get('/subadmins', 'SubAdminController@adminUsers')->name('subadmins.admins');
    Route::get('subadmins/create', 'SubAdminController@addAdmin')->name('subadmins.create');
    Route::post('subadmins/store', 'SubAdminController@store')->name('subadmins.store');
    Route::get('subadmins/destroy/{admin}', 'SubAdminController@destroy')->name('subadmins.destroy');
    Route::get('subadmins/edit/{admin}', 'SubAdminController@editAdmin')->name('subadmins.edit');
    Route::post('subadmins/update/{admin}', 'SubAdminController@update')->name('subadmins.update');
    //
    // //emps
    Route::get('/emps', 'EmployeeController@adminUsers')->name('emps.emps');
    Route::get('emps/create', 'EmployeeController@addAdmin')->name('emps.create');
    Route::post('emps/store', 'EmployeeController@store')->name('emps.store');
    Route::get('emps/destroy/{admin}', 'EmployeeController@destroy')->name('emps.destroy');
    Route::get('emps/edit/{admin}', 'EmployeeController@editAdmin')->name('emps.edit');
    Route::post('emps/update/{admin}', 'EmployeeController@update')->name('emps.update');
    // page
    Route::get('page/edit/{page}', 'PageController@edit')->name('page.edit');
    Route::post('page/update/{page}', 'PageController@update')->name('page.update');
    // orders
    Route::get('orders/', 'AdminController@orders')->name('admin.orders');
    Route::get('/reply/{id}', 'AdminController@convert_to')->name('admin.reply');
    Route::post('/convert_to/', 'AdminController@convert_to_post')->name('admin.convert_to');
    Route::post('reply/', 'AdminController@reply')->name('admin.reply.post');
    Route::get('/replies/{id}', 'AdminController@replies')->name('admin.replies');
    Route::get('/changeStatus/{id}', 'AdminController@changeStatus')->name('admin.status');
    Route::post('changeStatus/', 'AdminController@changeStatusPost')->name('admin.status.post');
    Route::get('order/destroy/{admin}', 'AdminController@destroy_order')->name('order.destroy');
//emails
    Route::get('emails/', 'AdminController@emails')->name('admin.emails');
    Route::get('email/destroy/{admin}', 'AdminController@destroy_email')->name('email.destroy');
       // clinet orders
    Route::get('clinet_orders/', 'ClinetOrderController@index')->name('admin.clinet.orders');
    Route::get('clinet_orders/destroy/{id}', 'ClinetOrderController@destroy')->name('clinet.order.destroy');
    Route::get('/creplies/{id}', 'ClinetOrderController@replies')->name('clinet.order.replies');
    Route::get('clinet_orders/destroy_replay/{id}', 'ClinetOrderController@destroy_replay')->name('clinet.order.destroy_replay');
});



Route::group(['namespace' => 'Admin'], function() {

    Route::resource('admin-cpx/users', 'UserController');
    //
    Route::get('/admin-cpx/users/block/{id}','UserController@block')->name('users.block');
    Route::get('/admin-cpx/users/unblock/{id}','UserController@unblock')->name('users.unblock');
    //
    Route::resource('admin-cpx/services', 'ServiceController');
    Route::resource('admin-cpx/faqs', 'FaqController');
    Route::resource('admin-cpx/works', 'WorkController');
    Route::resource('admin-cpx/products', 'ProductController');
    Route::resource('admin-cpx/client_products', 'ClinetProductController');
    Route::get('/admin-cpx/accept/{id}','ClinetProductController@accept')->name('clientProduct.accept');
     Route::get('/admin-cpx/reject/{id}','ClinetProductController@rejectPage')->name('clientProduct.rejectPage');
    Route::post('/admin-cpx/reject/{id}','ClinetProductController@reject')->name('clientProduct.reject');
   
    Route::resource('admin-cpx/news', 'NewsController');
    Route::resource('admin-cpx/offers', 'OfferController');
    Route::resource('admin-cpx/departments', 'DepartmentController');
    Route::resource('admin-cpx/sliders', 'SilderController');
    //////////////////////////////////////////////////////
});


