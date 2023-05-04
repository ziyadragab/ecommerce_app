<?php
namespace App\Http\Repositories\Admin;

use App\Http\interfaces\Admin\CategoryInterface;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\Redis\CategoryRedis;
use App\Models\Category;

class CategoryRepository implements CategoryInterface{

    use ImageTrait , CategoryRedis;

    public function index()
    {
       $categories= $this->getCategoryFromRedis();


       return view('Admin.pages.category.index',compact('categories'));
    }
    public function create()
    {
          return view('Admin.pages.category.create');
    }
    public function store($request)
    {
         $categoryImage=$this->uploadImage($request->image,$this->categoryModel::PATH);
         $this->categoryModel::create([
           'name'=>$request->name,
           'slug'=>$request->slug,
           'image'=>$categoryImage,
         ]);
          $this->setCategoriesInRedis();
           toast('Category Creates Successfully','success');
           return redirect(route('admin.category.index'));
    }
    public function edit($category)
    {


        return view('Admin.pages.category.update',compact('category'));
    }
    public function update($request, $category)
    {
          if($request->image){
            $categoryImage=$this->uploadImage($request->image,$this->categoryModel::PATH,$category->getRawOriginal('image'));

          }
         $category->update([
           'name'=>$request->name,
           'slug'=>$request->slug,
           'image'=>$categoryImage?? $category->getRawOriginal('image'),
          ]);
          $this->setCategoriesInRedis();
          toast('Category Updated Successfully','success');
          return redirect(route('admin.category.index'));
    }
    public function delete($category)
    {

           
           $category->delete();
           $this->setCategoriesInRedis();
           toast('Category Deleted Successfully','success');
           return back();
    }
}

?>