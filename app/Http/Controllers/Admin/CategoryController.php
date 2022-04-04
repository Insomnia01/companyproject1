<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
  public function index() {
    $categories = Category::all();
    $mainCategories = Category::getOnlyMainCategories(); 
    return view('Admin.categorylist', compact('mainCategories', 'categories')); 
  } 

  public function add()
  {
    $datalist = DB::table('category')->get();
    return view('Admin.add_category',['datalist' => $datalist]);
  }

  public function create(Request $request)
  {
    DB::table('category')->insert([
      'title' => $request->input('title'),
      'parent_id' => $request->input('parent_id'),
      'status' => $request->input('status')
    ]);
    return redirect()->Route("admin_category");
  }

  public function edit(Category $category, $id)
  {
    $data = Category::find($id);
    $datalist = DB::table('category')->get();
    return view('admin.edit_category',['data' => $data],['datalist' => $datalist]);
  }

  public function update(Request $request, Category $category,$id)
  {
    $data = Category::find($id);
    $data->title = $request->input('title');
    $data->parent_id = $request->input('parent_id');
    $data->status = $request->input('status');

    $data->save();

    return redirect()->Route("admin_category");
  }

  public function delete(Category $category, $id)
  {
    DB::table('category')->where('id','=',$id)->delete();
    return redirect()->Route("admin_category");
  }
}
