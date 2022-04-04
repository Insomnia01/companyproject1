<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Helpers\CategoryHelper;

class Category extends Model
{
  use HasFactory;
  public $table = 'category';
  protected $guarded = []; 


  public function children() {
    return $this->hasMany(Category::class, 'parent_id');
  } 

  public function parent() {
    return $this->belongsTo(Category::class, 'parent_id');  
  }


  public function products() {
    return $this->hasMany(Product::class);
  }



  public function getProductCount() : int { 
    return (new CategoryHelper())
      ->calculateRecursiveProductsCount($this)
      ->getCount() ?? 0; 
  }

  public static function getOnlyMainCategories() {
    return Category::doesntHave('parent')->get();
  }
}