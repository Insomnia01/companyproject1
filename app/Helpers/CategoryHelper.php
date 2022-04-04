<?php 

namespace App\Helpers;

class CategoryHelper {


  private $count; 

  public function calculateRecursiveProductsCount($category) { 
    if($category) {
      if($category->products()->exists()) {
        $this->count += $category->products()->count(); 
      } 

      if($category->children()->exists()) { 
        foreach($category->children as $category) {
            $this->calculateRecursiveProductsCount($category);
        }
      }
    }
    return $this;
  }

  public function getCount() {
      return $this->count;
  }
}