<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\interfaces\Admin\ProductInterface;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface=$productInterface;
    }

    public function index(){
        return $this->productInterface->index();
    }
    public function create(){
        return $this->productInterface->create();
    }
    public function store(StoreProductRequest $request){
        return $this->productInterface->store($request);
    }
    public function edit(Product $product){
        return $this->productInterface->edit($product);
    }
    public function update( UpdateProductRequest $request,Product $product){
        return $this->productInterface->update( $request,$product);
    }
    public function delete(Product $product){
        return $this->productInterface->delete($product);
    }
}
