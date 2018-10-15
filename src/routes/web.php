<?php
Route::group(['middleware' => ['web']], function () {

  Route::get('/products', ['uses' => 'jacek80\bmclient\ProductsController@show', 'as' => 'list']);
  
  Route::get('/create', ['uses' => 'jacek80\bmclient\ProductsController@create', 'as' => 'create']);
  Route::post('/store', ['uses' => 'jacek80\bmclient\ProductsController@store', 'as' => 'store']);
  
  Route::get('/edit', ['uses' => 'jacek80\bmclient\ProductsController@edit', 'as' => 'edit']);
  Route::post('/update', ['uses' => 'jacek80\bmclient\ProductsController@update', 'as' => 'update']);
  
  Route::get('/delete', ['uses' => 'jacek80\bmclient\ProductsController@destroy', 'as' => 'delete']);
  
});
?>

