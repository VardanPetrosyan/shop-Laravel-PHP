<?php

use Illuminate\Support\Facades\Route;
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
Route::group(
    [
        'middleware'=> 'SetLocale',
    ],
    function(){

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//---Facebook login route

Route::get('/redirect', 'Auth\LoginController@redirect');
Route::get('/callback', 'Auth\LoginController@callback');

 //---- Google login


 Route::get('/auth/google', 'Auth\LoginController@redirectToGoogle');
 Route::get('/auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

//---- Telegram login

 Route::get('/login/auth/telegram/callback', 'Auth\LoginController@handleTelegramCallback');


Route::group(['middleware' => 'role:client'], function () {
        //-----Category view
        
        Route::get('/', 'CategoryController@index')->name('Category');


        //-----Product and Category route view

                Route::get('/add','CategoryController@show')->name('item.role');

        //-----Product and Category route view

                Route::get('/addProduct', 'CategoryController@addProduct')->name('add.Product');

        //-----Product add

                Route::post('/addProduct','CategoryController@product_Add')->name('addProduct');

        //-----Category add

                Route::post('/addCategorie','CategoryController@categorie_Add')->name('addCategory');

        //-----Category remove

                Route::post('/removeCategorie','CategoryController@categorie_Remove')->name('removeCategory');
        //-----Category Edit

                Route::post('/editCategorie','CategoryController@categorie_Edit')->name('editCategory');


        //-----Product remove

                Route::post('/productRemove','CategoryController@product_Remove')->name('removeProduct');

        //-----Product Edit

                Route::get('/productEdit','CategoryController@product_Edit')->name('editProduct');



        // ----- Product rout view
                Route::get('/categories', 'CategoryController@showProduct')->name('product');

                Route::get('/categories/{role}', 'CategoryController@showProduct')->name('show_product');


        // --- Product Info add

                Route::post("/categories/infoadd","CategoryController@Product_Info_add")->name('infoadd');

       
        Route::group(['middleware' => 'role:manager'], function () {
                Route::get('/admin', function () {
                return view('admin.admin');
                })->name('admin');

                Route::get('/dist/index.blade.php', function () {
                return view('admin.dist.index');
                });

                Route::get('/admin/translation', 'TranslationController@translation')->name('lang_translation');
                Route::get('/admin/translation/api', 'TranslationController@country_api')->name('lang_api');
                Route::post('/admin/translation/CreatLang', 'TranslationController@CreatLang')->name('CreatLang');
                Route::get("/{language}", function ($lang) {
                $_SESSION['lang'] = $lang;
                return redirect()->back();
                })->name('locale');
                Route::post('/admin/translation/creatJSON', 'TranslationController@creatJSON')->name('JSON');
                Route::post('/admin/translation/deletLang', 'TranslationController@deletLang')->name('deletLang'); 
                        Route::group(['middleware' => 'role:admin'], function () {
                                Route::get('/admin/profiles', 'RoleController@Profiles')->name('profiles');
                                Route::post('/admin/profiles/editrole', 'RoleController@EditRole')->name('editrole');
                        });  
        }); 
        });
});

