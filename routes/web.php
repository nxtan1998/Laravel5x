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
Route::get('x', function () {
    return view('page.test');
});
Route::get('/', function () {
    return view('page.lienhe');
});
// Route::get('thu', function () 
// {
//     return view('admin.user.danhsach');
// });
Route::get('index',[
'as'=>'trangchu',
'uses'=>'pagecontroller@getindex'
]);
Route::get('LoaiSanPham/{type?}',[
'as'=>'loaisanpham',
'uses'=>'pagecontroller@getloaisp'
]);
Route::get('ChiTietSanPham/{id?}',[
'as'=>'chitietsanpham,',
'uses'=>'pagecontroller@getchitietsp'
]);
Route::get('SanPham/{id}',[
'as'=>'sanpham',
'uses'=>'pagecontroller@getsp'
]);
Route::get('LienHe',[
'as'=>'lienhe',
'uses'=>'pagecontroller@getlienhe'
]);
Route::get('GioiThieu',[
'as'=>'gioithieu',
'uses'=>'pagecontroller@getgioithieu'
]);

Route::get('show',[
'as'=>'showcart',
'uses'=>'cartcontroler@showcart'
]);
route::get('muahang/{id}',[
'as'=>'Muahang',
'uses'=>'pagecontroller@muahang'
]);
route::get('Giohang',[
'as'=>'giohang',
'uses'=>'pagecontroller@giohang'
]);
route::get('a',[
'as'=>'giohang',
'uses'=>'pagecontroller@giohang'
]);
route::get('b/{id}',[
'as'=>'xoa',
'uses'=>'pagecontroller@xoasanpham'
]);
route::get('dat-hang',[
'as'=>'dathang',
'uses'=>'pagecontroller@getcheckout'
]);
route::post('dat-hang',[
'as'=>'dathang',
'uses'=>'pagecontroller@postcheckout'
]);
route::get('login',[
'as'=>'dangnhap',
'uses'=>'pagecontroller@getdangnhap'
]);
route::post('login',[
'as'=>'dangnhap',
'uses'=>'pagecontroller@postdangnhap'
]);
route::get('signup',[
'as'=>'dangki',
'uses'=>'pagecontroller@getdangki'
]);
route::post('signup',[
'as'=>'dangki',
'uses'=>'pagecontroller@postdangki'
]);
route::get('logout',[
'as'=>'dangxuat',
'uses'=>'pagecontroller@getdangxuat'
]);
route::get('seach',[
'as'=>'timkiem',
'uses'=>'pagecontroller@gettimkiem'
]);
route::get('abc',[
'as'=>'kiemtra',
'uses'=>'pagecontroller@abc'
]);
route::get('list_user',[
'as'=>'danhsachuser',
'uses'=>'Admincontroller@listuser'
]);

route::get('add_list',[
'as'=>'danhsachuser',
'uses'=>'Admincontroller@getaddlist'
]);
route::post('add_list',[
'as'=>'danhsachuser',
'uses'=>'Admincontroller@postaddlist'
]);





