@extends('Admin/includes/master')

@section('content')
<div id="content" class="main-content">
    <div class="container">

        <div class="container">

            <!--  BEGIN BREADCRUMBS  -->
            <div class="secondary-nav">
                <div class="breadcrumbs-container" data-page-heading="Analytics">
                    <a href="{{ route('admin.ad.create') }}" class="btn btn-primary">ADD New Ad</a>

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
            <div class="row layout-top-spacing">

                <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4 class="text-center mt-2">ALL ADS</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">AD NAME</th>

                                            <th scope="col">AD IMAGE</th>
                                            <th scope="col">EDIT</th>
                                            <th scope="col">DELETE</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ads as $ad )
                                        <tr>
                                            <td>{{$ad->name}}</td>
                                            <td><img src="{{ asset($ad->image) }}" width="100px" height="100px alt=""></td>

                                            <td class=" text-center col-2">
                                                <a href="{{route('admin.ad.edit',$ad)}}"
                                                    class="btn btn-success">Edit</a>
                                            </td>

                                            <td class="text-center col-2">
                                                <form action="{{route('admin.ad.delete',$ad)}}" method="POST"
                                                    style="display: inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger">DELETE</button>
                                                </form>
                                            </td>


                                        </tr>
                                        @empty
                                        <h5>No Data Found</h5>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection