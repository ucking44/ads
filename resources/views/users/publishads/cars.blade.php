@extends('layouts.app')

@section('title', 'User')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <strong>Categories</strong>
                </div>
                <div class="card-body cardcategories">
                    <ul class="userpgcategory fa-ul">
                        @if (isset($categories))
                            @if (count($categories) > 0)
                                @foreach($categories as $category)
                                    <li>
                                        <a href='{{ url('/post-classified-ads/'.preg_replace('/\s+/','',$category->maincategory).'/'.$category->id) }}'>{!! html_entity_decode($category->icons) !!}{{ $category->maincategory }}</a>
                                    </li>
                                @endforeach
                            @else
                            @endif
                        @endif
                        <li><a href=""></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <strong>Advertisements</strong>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" class="nav-link" data-toggle="tab">Cars</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div id="home">

                        </div>
                    </div>

                    <div id="myTabContent" class="tab-content">
                        <div id="home">
                            <h1 style="padding: 10px 10px;" id="selcatmsg"></h1>
                            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('/postcars') }}" style="padding-left: 20px;">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        @if (count($errors) > 0)
                                            @foreach($errors->all() as $error)

                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="hidden" name="maincategory_id" value={{ Request::segment(3) }}>
                                                <label><strong>Select Subcategory</strong></label>
                                                <select name="subcategory_id" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    @if (count($subcategories) > 0)
                                                        @foreach ($subcategories as $subcategory)
                                                            <option value={{ $subcategory->id }}>{{ $subcategory->subcategory }}</option>
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('subcategory_id'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('subcategory_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Product Name</strong></label>
                                                <input type="text" class="form-control" name="productName" placeholder="Product Name">
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('productName'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('productName') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Year Of Purchase</strong></label>
                                                <input type="text" class="form-control" name="yearsOfPurchase" placeholder="Year Of Purchase">
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('yearsOfPurchase'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('yearsOfPurchase') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Expected Selling Price</strong></label>
                                                <input type="text" class="form-control" name="expSellPrice" placeholder="Expecting Selling Price">
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('expSellPrice'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('expSellPrice') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Name</strong></label>
                                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('name'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Mobile</strong></label>
                                                <input type="text" class="form-control" name="mobile" placeholder="Your Mobile">
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('mobile'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('mobile') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Email</strong></label>
                                                <input type="text" class="form-control" name="email" placeholder="Your Email">
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('email'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('email') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>State</strong></label>
                                                <select name="state" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    @if (count($states) > 0)
                                                        @foreach ($states as $state)
                                                            <option value={{ $state->id }}>{{ $state->stateName }}</option>
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('state'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('state') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>City</strong></label>
                                                <input type="text" class="form-control" name="city" placeholder="Enter Your City">
                                            </div>
                                        </div>

                                        {{-- <label style="padding: 23px;"></label> --}}
                                        <label></label>
                                        @if ($errors->has('city'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('city') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Photos Of Your Vehicle (Max 4)</strong></label>
                                                <input type="file" class="form-control" name="photos[]" multiple="true">
                                            </div>
                                        </div>

                                        {{-- <label style="padding: 23px;"></label> --}}
                                        <label></label>
                                        @if ($errors->has('photos'))
                                            <span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">{{ $errors->first('photos') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" style="text-align: center;">
                                            <button id="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-primary">Post Your AD</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- @section('Ads', 'User') --}}

@endsection
