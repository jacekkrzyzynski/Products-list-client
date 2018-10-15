<?php

namespace Jacek80\Bmclient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreFormValidation;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('bmclient::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      $this->validate($request,[
          'name' => 'required',
          'amount' => 'required|integer',
          ]);    
      
      $client = new Client();
      $res = $client->request('POST', Config::get('bmclientconfig.api_endpoint') . '/new', [
          'form_params' => [
              'name' => $request->name,
              'amount' => $request->amount
              ]
          ]);   
             
      //return $request;
      
      return redirect(route('list'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show()
    {      
      $all_products = [];
      $products_in_stock = [];
      $products_in_stock_5 = [];
      $products_out_of_stock = [];
        
      $client = new Client();
      $res = $client->request('GET', Config::get('bmclientconfig.api_endpoint'));
      $res_decoded = json_decode($res->getBody());
      
      foreach($res_decoded as $product)
      {
        $all_products[] = $product;
        
        if ($product->amount > 0)
          $products_in_stock[] = $product;
          
        if ($product->amount > 5)
          $products_in_stock_5[] = $product;
          
        if ($product->amount == 0)
          $products_out_of_stock[] = $product;
          

      }
      
      $products_compacted = [
          "all_products" => $all_products,
          "products_in_stock" => $products_in_stock,
          "products_in_stock_5" => $products_in_stock_5,
          "products_out_of_stock" => $products_out_of_stock,
          ];
    
      return view('bmclient::list', compact('products_compacted'));
    }
          
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $client = new Client();
      $res = $client->request('GET', Config::get('bmclientconfig.api_endpoint'));
      $res_decoded = json_decode($res->getBody());
      
      foreach($res_decoded as $product)  
      {
        if ($product->id == $request->id)
          $product_edited = $product;
      }
              
      return view('bmclient::edit', compact('product_edited'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->validate($request,[
          'id' => 'required',
          'name' => 'required',
          'amount' => 'required|integer',
          ]);    
      
      $client = new Client();
      $res = $client->request('POST', Config::get('bmclientconfig.api_endpoint') . '/update', [
          'form_params' => [
              'id' => $request->id,
              'name' => $request->name,
              'amount' => $request->amount,
              ]
          ]);   
             
      //return $request;
      
      return redirect(route('list'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $client = new Client();
      $res = $client->request('POST', Config::get('bmclientconfig.api_endpoint') . '/delete', [
          'form_params' => [
              'id' => $request->id
              ]
          ]);
      
      return redirect(route('list'));  
    }
}
