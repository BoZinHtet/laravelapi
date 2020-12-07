<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index(){
    	return Product::all();
    }

    public function store(ProductCreateRequest $request){
    	return Product::create($request->only(['name','price']));
    }

    public function show($id){
    	return Product::findOrFail($id);
    }

    public function update($id,ProductUpdateRequest $request){
    	$product=Product::findOrFail($id);
    	$product->name=$request->name;
    	$product->price=$request->price;
    	$product->save();
    	return $product;
    }

     public function destroy($id){
     	$product=Product::findOrFail($id);
     	$product->delete();
     	return $product;
    }
}
