<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', ['as' => 'Ft_Home_Index', 'uses' => 'frontend\HomeController@index']);
    Route::get('get_product_by_cate_ajax/{id}', ['as' => 'Ft_Home_Get_Products', 'uses' => 'frontend\HomeController@getProductByCate']);
    Route::get('push_array_cookie/{id}', ['as' => 'Ft_Home_Push_Cookie', 'uses' => 'frontend\HomeController@pushCookie']);
    Route::get('get_product_ajax/{page}/{cate}/{cate_2_id}', ['as' => 'Ft_Home_Get_Products_Ajax', 'uses' => 'frontend\HomeController@getProduct']);
	Route::get('get_list_seen',['as'=>'Ft_Get_List_Seen','uses'=>'frontend\HomeController@getListProductSeen']);
    Route::get('tim-kiem.html',['as'=>'Ft_Home_Search','uses'=>'HomeController@search']);
    Route::get('sitemap.xml',['as'=>'Ft_SiteMap_Index','uses'=>'SiteMapController@index']);
    Route::get('tu-van-san-pham.html',['as'=>'Ft_Post_Index','uses'=>'frontend\PostController@index']);
    #Route::get('tu-van/{alias}.html',['as'=>'Ft_Post_View','uses'=>'frontend\PostController@view']);

    Route::get('ket-toan.html',['as'=>'Ft_Cart_CheckOut','uses'=>'frontend\CartController@getPayment']);
    Route::post('ket-toan.html',['as'=>'Ft_Cart_CheckOut','uses'=>'frontend\CartController@postPayment']);
    #Route::post('thanh-toan.html',['as'=>'Ft_Cart_Paid','uses'=>'frontend\CartController@paid']);
    #Route::get('dat-hang/{id}.html',['as'=>'Ft_Cart_Order','uses'=>'frontend\CartController@getAddtoCart']);
    #Route::post('cap-nhat-gio-hang.html',['as'=>'Ft_Cart_Update','uses'=>'frontend\CartController@update']);
    Route::post('/cart',['as'=>'themvaogiohang','uses'=> 'frontend\CartController@addTocart']);
    Route::get('/updatecart',['as'=>'capnhatgiohang','uses'=> 'frontend\CartController@updateCart']);
    Route::get('/deletecart',['as'=>'xoagiohang','uses'=> 'frontend\CartController@deleteCart']);
    Route::get('gio-hang.html',['as'=>'Ft_Cart_Index','uses'=>'frontend\CartController@index']);
    Route::get('mua-hang-thanh-con.html',['as'=>'muahangthanhcong','uses'=>'frontend\CartController@thanks']);


    Route::get('noi-dung.html', ['as' => 'Ft_Content_Index', 'uses' => 'frontend\ContentController@switchDir']);
    Route::get('phuong-thuc-thanh-toan.html', ['as' => 'Ft_Page_Index', 'uses' => 'frontend\PageController@index']);
    Route::get('gioi-thieu.html', ['as' => 'Ft_Page_Index', 'uses' => 'frontend\PageController@index']);
    Route::get('chinh-sach-bao-mat.html', ['as' => 'Ft_Page_Index', 'uses' => 'frontend\PageController@index']);
    Route::get('van-chuyen-va-giao-nhan-hang.html', ['as' => 'Ft_Page_Index', 'uses' => 'frontend\PageController@index']);
    Route::get('dieu-khoang-mua-ban-hang-hoa.html', ['as' => 'Ft_Page_Index', 'uses' => 'frontend\PageController@index']);
    Route::get('{slug}.html', ['as' => 'Ft_Content_Detail', 'uses' => 'frontend\ContentController@index']);

    Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'frontend\CartController@getAddtoCart']);
    Route::get('del-cart/{id}',['as'=>'xoagiohang','uses'=>'frontend\CartController@getDelItemCart']);
  
    
Route::group(['prefix'=>'admin'],function(){
    Auth::routes();    
	
	Route::group(['prefix' => 'category'], function () {
        Route::get('list', function () {
            $category=DB::table('xf_node')->orderBy('lft', 'ASC')->leftjoin('category', 'xf_node.node_id', '=', 'category.id')->get();
            return view('admin.category.index',
                [   'title'=>'Category',
                    'data'=>$category
                ]
            );
        });
//        Route::get('list', ['as' => 'category_list', 'uses' => 'admin\CategoryController@getList']);
        Route::get('add', ['as' => 'category_add', 'uses' => 'admin\CategoryController@getAdd']);
        Route::post('add', ['as' => 'category_add', 'uses' => 'admin\CategoryController@postAdd']);
        Route::get('edit/{id}', ['as' => 'category_edit', 'uses' => 'admin\CategoryController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'category_edit', 'uses' => 'admin\CategoryController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'category_delete', 'uses' => 'admin\CategoryController@getDelete']);       
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('list', ['as' => 'orders_list', 'uses' => 'admin\OrdersController@getList']);
        Route::get('edit/{id}', ['as' => 'orders_edit', 'uses' => 'admin\OrdersController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'orders_edit', 'uses' => 'admin\OrdersController@postEdit']); 
              
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('list', ['as' => 'products_list', 'uses' => 'admin\ProductsController@getList']);
        Route::get('add', ['as' => 'products_add', 'uses' => 'admin\ProductsController@getAdd']);
        Route::post('add', ['as' => 'products_add', 'uses' => 'admin\ProductsController@postAdd']);
        Route::get('edit/{id}', ['as' => 'products_edit', 'uses' => 'admin\ProductsController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'products_edit', 'uses' => 'admin\ProductsController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'products_delete', 'uses' => 'admin\ProductsController@getDelete']);       
    });
    Route::group(['prefix' => 'news'], function () {
        Route::get('list', ['as' => 'news_list', 'uses' => 'admin\NewsController@getList']);
        Route::get('add', ['as' => 'news_add', 'uses' => 'admin\NewsController@getAdd']);
        Route::post('add', ['as' => 'news_add', 'uses' => 'admin\NewsController@postAdd']);
        Route::get('edit/{id}', ['as' => 'news_edit', 'uses' => 'admin\NewsController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'news_edit', 'uses' => 'admin\NewsController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'news_delete', 'uses' => 'admin\NewsController@getDelete']);       
    });
    Route::group(['prefix' =>'ajax'],function(){
    	Route::get('category/{category_id}','admin\AjaxController@getCategory');
    });
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'admin\DashboardController@getList']);
	Route::get('login', ['as' => 'admin_login', 'uses' => 'admin\Auth\LoginController@login'])->middleware('auth');
    Route::get('login.html', ['as' => 'login', 'uses' => 'admin\Auth\LoginController@login']);
	Route::post('login', ['as' => 'admin_Authenticate', 'uses' => 'admin\Auth\LoginController@authenticate']);
	Route::get('logout', ['as' => 'admin_Logout', 'uses' => 'admin\Auth\LoginController@logout']);
    /* start phân quyền user */
    Route::group(['prefix' => 'admin_group'], function () {
        Route::get('list', ['as' => 'admin_group_list', 'uses' => 'admin\Admin_groupController@getList']);
        Route::get('add', ['as' => 'admin_group_add', 'uses' => 'admin\Admin_groupController@getAdd']);
        Route::post('add', ['as' => 'admin_group_add', 'uses' => 'admin\Admin_groupController@postAdd']);
        Route::get('edit/{id}', ['as' => 'admin_group_edit', 'uses' => 'admin\Admin_groupController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'admin_group_edit', 'uses' => 'admin\Admin_groupController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'admin_group_delete', 'uses' => 'admin\Admin_groupController@getDelete']);       
    });
    Route::group(['prefix' => 'modules'], function () {
        Route::get('list', ['as' => 'modules_list', 'uses' => 'admin\ModulesController@getList']);
        Route::get('add', ['as' => 'modules_add', 'uses' => 'admin\ModulesController@getAdd']);
        Route::post('add', ['as' => 'modules_add', 'uses' => 'admin\ModulesController@postAdd']);
        Route::get('edit/{id}', ['as' => 'modules_edit', 'uses' => 'admin\ModulesController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'modules_edit', 'uses' => 'admin\ModulesController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'modules_delete', 'uses' => 'admin\ModulesController@getDelete']);       
    });
    Route::group(['prefix' => 'permision'], function () {
        Route::get('list', ['as' => 'permision_list', 'uses' => 'admin\PermisionsController@getList']);
        Route::get('add', ['as' => 'permision_add', 'uses' => 'admin\PermisionsController@getAdd']);
        Route::post('add', ['as' => 'permision_add', 'uses' => 'admin\PermisionsController@postAdd']);
        Route::get('edit/{id}', ['as' => 'permision_edit', 'uses' => 'admin\PermisionsController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'permision_edit', 'uses' => 'admin\PermisionsController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'permision_delete', 'uses' => 'admin\PermisionsController@getDelete']);  
    });
    /* end phân quyền user */
    /* quản lý users */
    Route::group(['prefix' => 'users'], function () {
        Route::get('list', ['as' => 'users_list', 'uses' => 'admin\UsersController@getList']);
        Route::get('add', ['as' => 'users_add', 'uses' => 'admin\UsersController@getAdd']);
        Route::post('add', ['as' => 'users_add', 'uses' => 'admin\UsersController@postAdd']);
        Route::get('edit/{id}', ['as' => 'users_edit', 'uses' => 'admin\UsersController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'users_edit', 'uses' => 'admin\UsersController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'users_delete', 'uses' => 'admin\UsersController@getDelete']);       
    });
    /* quản lý banner */
    Route::group(['prefix' => 'banner'], function () {
        Route::get('list', ['as' => 'banner_list', 'uses' => 'admin\BannersController@getList']);
        Route::get('add', ['as' => 'banner_add', 'uses' => 'admin\BannersController@getAdd']);
        Route::post('add', ['as' => 'banner_add', 'uses' => 'admin\BannersController@postAdd']);
        Route::get('edit/{id}', ['as' => 'banner_edit', 'uses' => 'admin\BannersController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'banner_edit', 'uses' => 'admin\BannersController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'banner_delete', 'uses' => 'admin\BannersController@getDelete']);       
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('list', ['as' => 'slide_list', 'uses' => 'admin\SlidesController@getList']);
        Route::get('add', ['as' => 'slide_add', 'uses' => 'admin\SlidesController@getAdd']);
        Route::post('add', ['as' => 'slide_add', 'uses' => 'admin\SlidesController@postAdd']);
        Route::get('edit/{id}', ['as' => 'slide_edit', 'uses' => 'admin\SlidesController@getEdit']); 
        Route::post('edit/{id}', ['as' => 'slide_edit', 'uses' => 'admin\SlidesController@postEdit']); 
        Route::get('delete/{id}', ['as' => 'slide_delete', 'uses' => 'admin\SlidesController@getDelete']);       
    });
    /* send mail */
    Route::get('send', ['as' => 'send', 'uses' => 'admin\MailController@mail']);
   
});


