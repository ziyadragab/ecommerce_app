@extends('Admin.includes.master')

@section('title')
Edit Category
@endsection

@section('content')
<div id="content" class="main-content">
    <div class="container">
        <div class="container">
            <div class="row">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Edit Category</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('admin.product.update', $product) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput2">Product name</label>
                                        <input type="text" class="form-control" name="name" value="{{$product->name}}"
                                            id="exampleFormControlInput2" placeholder="Product name">
                                        @error('name')
                                        <p class="alert alert-danger mt-1" role="alert">{{ $message }}</p>

                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput2">Product Price</label>
                                        <input type="text" class="form-control" name="price" value="{{$product->price}}"
                                            id="exampleFormControlInput2" placeholder="Product Price">
                                        @error('price')
                                        <p class="alert alert-danger mt-1" role="alert">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <select name="category_id" id="" class="form-control my-2">
                                        <option value="">Select Category Menu</option>
                                        @foreach ($categories as $category )
                                        <option value="{{$category->id}}" @selected('category_id')>{{$category->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="alert alert-danger mt-1" role="alert">{{ $message }}</p>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput2">Product description</label>
                                        <textarea name="description" id="" cols="195"
                                            rows="10">{{ $product->description }}</textarea>
                                        @error('description')
                                        <p class="alert alert-danger mt-1" role="alert">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class=" input-group mb-3 mt-4">
                                            <img src="{{asset($product->image)}}" width="100px" height="100px">
                                        </div>
                                        <label for="exampleFormControlInput2">product image</label>
                                        <input type="file" class="form-control" value="" name="image"
                                            id="exampleFormControlInput2">
                                        @error('image')
                                        <p class="alert alert-danger mt-1" role="alert">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection