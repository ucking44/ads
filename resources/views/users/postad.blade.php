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
                            <a href="#home" class="nav-link" data-toggle="tab">Categories</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div id="home">
                            <h2 style="padding: 10px; text-align: center; color: #6d6d6d;">SELECT YOUR CATEGORY</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @section('Ads', 'User') --}}

@endsection
