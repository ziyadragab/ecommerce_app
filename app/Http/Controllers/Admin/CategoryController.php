<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\interfaces\Admin\CategoryInterface;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface=$categoryInterface;
    }

        public function index()
    {
     return $this->categoryInterface->index();
    }
    public function create()
    {
        return $this->categoryInterface->create();
    }
    public function store(StoreCategoryRequest $request)
    {
        return $this->categoryInterface->store($request);
    }
    public function edit(Category $category)
    {

        return $this->categoryInterface->edit($category);
    }
    public function update(UpdateCategoryRequest $request,Category $category)
    {
       return $this->categoryInterface->update($request,$category);
    }
    public function delete(Category $category)
    {
        return $this->categoryInterface->delete($category);
    }
}
