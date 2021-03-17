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
                                        <a href='{{ url('/viewAds/'.preg_replace('/\s+/','',$category->maincategory).'/'.$category->id) }}'>{!! html_entity_decode($category->icons) !!}{{ $category->maincategory }}</a>
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
                    @if (isset($product))
                        @if (count($product) > 0)
                            @foreach ($product as $ad)
                                <?php $img = [];
                                       $img = explode(",", $ad->photos);
                                ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row featured" id="featured-image">
                                            <img class="main" src="{{ $img[0] }}" alt="" width="100%" />
                                            <p>
                                                @if (isset($img[1]))
                                                    <img src="{{ $img[1] }}" alt="" width="100px" height="100px" />
                                                @endif
                                                @if (isset($img[2]))
                                                    <img src="{{ $img[2] }}" alt="" width="100px" height="100px" />
                                                @endif
                                                @if (isset($img[3]))
                                                    <img src="{{ $img[3] }}" alt="" width="100px" height="100px" />
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card border-secondary wb-3" style="max-width: 20rem; border: 1px solid #ccc !important;">
                                            <div class="card-header">PRODUCT DETAILS</div>
                                            <div class="card-body">
                                                <h6>Name:
                                                    <span title="xtra large">{{ $ad->productName }}</span>
                                                </h6>
                                                <hr>
                                                <h6>Purchased On:
                                                    <span title="xtra large">{{ $ad->yearsOfPurchase }}</span>
                                                </h6>
                                                <hr>
                                                <h6>Price:
                                                    <span title="xtra large">{{ $ad->expSellPrice }}</span>
                                                </h6>
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="card border-secondary wb-3" style="max-width: 20rem; border: 1px solid #ccc !important;">
                                            <div class="card-header">SELLER DETAILS</div>
                                            <div class="card-body">
                                                <h6>Name:
                                                    <span title="xtra large">{{ $ad->name }}</span>
                                                </h6>
                                                <hr>
                                                <h6>Phone:
                                                    <span title="xtra large">{{ $ad->mobile }}</span>
                                                </h6>
                                                <hr>
                                                <h6>Email:
                                                    <span title="xtra large">{{ $ad->email }}</span>
                                                </h6>
                                                <hr>
                                                <h6>State:
                                                    <span title="xtra large">{{ $ad->state }}</span>
                                                </h6>
                                                <hr>
                                                <h6>City:
                                                    <span title="xtra large">{{ $ad->city }}</span>
                                                </h6>
                                                <hr>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Not Found!</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @section('Ads', 'User') --}}

@endsection
