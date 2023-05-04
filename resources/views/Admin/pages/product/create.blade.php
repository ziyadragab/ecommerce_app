@extends('Admin.includes.master')

@section('title')
Add Product
@endsection

@section('content')
<div id="content" class="main-content">
    <div class="container">

        <div class="container">

            <!--  BEGIN BREADCRUMBS  -->
            <div class="secondary-nav">
                <div class="breadcrumbs-container" data-page-heading="Analytics">
                    <header class="header navbar navbar-expand-sm">
                        <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-menu">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </a>
                        <div class="d-flex breadcrumb-content">
                            <div class="page-header">

                                <div class="page-title">
                                </div>

                                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Form</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Basic</li>
                                    </ol>
                                </nav>

                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Create New Category</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.product.store') }}">
                            @csrf

                            <div class="form-group mb-4">

                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="exampleFormControlInput2" placeholder="Product Name">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-4">

                                <input type="text" class="form-control" name="price" value="{{ old('name') }}"
                                    id="exampleFormControlInput2" placeholder="Product price">
                                @error('price')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="">Product Description</label>
                                <textarea name="description" id=""
                                    class="form-control my-2 @error('description') is-invalid @enderror"
                                    placeholder="Product Description" cols="30" rows="10"></textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input type="file" class="form-control" name="image" id="exampleFormControlInput2">
                                @error('image')
                                <p class="text-danger">{{ $message }}</p>

                                @enderror
                            </div>

                            <select name="category_id" id="" class="form-control my-2">
                                <option value="">Select Category Menu</option>
                                @foreach ($categories as $category )
                                <option value="{{$category->id}}" @selected('category_id')>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>

                            @enderror

                            <input type="submit" class="mt-4 mb-4 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection