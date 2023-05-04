<?php
namespace App\Http\Traits\Admin;

use App\Models\Category;

trait CategoryTrait{

   private  $categoryModel;
   public function __construct(Category $category)
   {
      $this->categoryModel=$category;
   }

    private function getAllCategory(){
        return $this->categoryModel::get();
    }
}

?>
