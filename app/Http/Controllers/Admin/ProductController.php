<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  public function index(Request $request)
  {
      $datalist = Product::select(['id','title','stock','status','category_id'])->get();
      return view('Admin.productlist', ['datalist' => $datalist]);

  }

  public function add()
  {
      $datalist = Category::all();
      return view('Admin.add_products',['datalist' => $datalist]);
  }

  public function update(Request $request, Product $product) 
  {
    $this->validate($request, [
      'title'=>'required',
      'stock'=>'required',
      'status'=>'required',
      'category_id'=>'required',
    ]);

    $product->update([
      'title'=> $request->title,
      'stock'=>$request->stock,
      'status'=>$request->status,
      'category_id'=>$request->category_id,
    ]);

    return redirect()->Route("admin_product");
  }

  public function edit(Product $product) {
    $categories = Category::all();
    return view('Admin.edit_product', ['data' => $product, 'categories' => $categories]); 
  }

  public function delete(Product $product) {
    $product->delete(); 
    return redirect()->route('admin_product');
  }

  public function store(Request $request)
  {
    $data = new Product;
    $data->category_id = $request->input('category_id');
    $data->title = $request->input('title');
    $data->stock = $request->input('stock');
    $data->status = $request->input('status');

    $data->save();
    return redirect()->route('admin_product');
  }
}
