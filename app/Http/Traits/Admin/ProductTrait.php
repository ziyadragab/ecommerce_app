<?php
namespace App\Http\Traits\Admin;

use App\Models\Product;

trait ProductTrait{

    private $productModel;
    public function __construct(Product $product){
         $this->productModel=$product;
    }

    private function getAllProduct(){
          return $this->productModel::with('category')->paginate(20);
    }
}
?>