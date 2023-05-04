<?php
namespace App\Http\Repositories\Admin;

use App\Http\interfaces\Admin\ProductInterface;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\Redis\ProductRedis;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductInterface {
    use ImageTrait,ProductRedis;

    public function index()
    {
      $products= $this->getProductsFromRedis();

    //   dd($products);

      return view('Admin.pages.product.index',compact('products'));
    }
    public function create()
    {
        $categories=Category::get();
        return view('Admin.pages.product.create',compact('categories'));
    }
    public function store($request)
    {

         $productImage=$this->uploadImage($request->image,$this->productModel::PATH);
         $this->productModel::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'image'=>$productImage,
         ]);
         $this->setProductsInRedis();
         toast('Product Created Successfully','success');
         return redirect(route('admin.product.index'));
    }
    public function edit($product)
    {
        $categories=Category::get();
          return view('Admin.pages.product.update',compact(['product','categories']));

    }
    public function update($request, $product)
    {
        if($request->image){
           $productImage= $this->uploadImage($request->image,$this->productModel::PATH,$product->getRawOriginal('image'));
        }
       $product->update([
            'name'=>$request->name,

            'price'=>$request->price,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'image'=>$productImage??$product->getRawOriginal('image')
        ]);

        $this->setProductsInRedis();
        toast('Product Updated Successfully','success');
        return redirect(route('admin.product.index'));
    }
    public function delete($product)
    {

       $this->removeImage($product->image);
       $product->delete();
       $this->setProductsInRedis();
       toast('product Deleted Successfully','success');
       return back();
    }
}
?>
