<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uc_King') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: cyan !important">
            <div class="container">
                <div class="col-lg-2">
                    <div class="row">
                        <a class="navbar-brand" href="{{ url('/') }}" style="color: black; font-size: 28px;">
                            Uc King
                            {{-- {{ config('app.name', 'Laravel') }} --}}
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}" style="color: black;">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}" style="color: black;">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" style="color: black;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                                <li style="margin-top: 9px;"><a href='{{ url('/post-classified-ads') }}' style="color: black; text-decoration: none;">Add Post</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-4">
                            <form class="form-horizontal" method="POST" action="{{ url('/product/search') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-8">
                                        <input type="text" name="searchonproduct" required="true" class="form-control" placeholder="Enter Product" style="margin-top: 5px;">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" name="" value="Search" class="btn btn-primary" style="margin-top: 5px;">Search</button>
                                        {{-- <input type="submit" name="" class="btn btn-default" style="margin-top: 5px;"> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-8">
                            <form class="form-horizontal" method="POST" action="{{ url('/search/advertisements') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <input type="text" name="state" id="state" class="form-control" required="true" placeholder="Enter State" style="margin-top: 5px;">
                                        <div id="stateList"></div>
                                        <div id="cityList" style="display: block; position: absolute; border-radius: 0px; width: 88%; padding: 0px 13px; overflow-y: auto; z-index: 1;"></div>
                                        <input type="text" name="city" id="city" style="background: cyan; border: 1px solid cyan; color: black;">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control dropdown" name="categories" id="categories" class="categories" style="margin-top: 5px;">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="" value="Search" class="btn btn-primary" style="margin-top: 5px;">Search</button>
                                        {{-- <input type="submit" name="searchads" class="btn btn-primary" value="Search" style="margin-top: 5px;"> --}}
                                    </div>
                                    <div class="col-lg-6"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#state').keyup(function() {
            var data;
            var naijastates = $(this).val();
            if (naijastates != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('searchlocation') }}",
                    method: "POST",
                    data: {naijastates:naijastates, _token:_token},
                    success: function(data){
                        $('#stateList').fadeIn();
                        $('#stateList').html(data);
                    }
                });
            }
            else {
                $('#stateList').fadeOut();
                $('#stateList').html(data);
            }
        });

        $(document).on('click', '#search', function() {
            $('#state').val($(this).text());
            $('#stateList').fadeOut();
        });
    });

    $(document).on('click', '#stateList ul li', function() {
        var state = $('#state').val();
            var id = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('state') }}",
                    method: "POST",
                    data: {id:id, _token:_token},
                    success: function(data){
                        $('#cityList').fadeIn();
                        $('#cityList').html(data);
                    }
                });
            // else {
            //     $('#stateList').fadeOut();
            //     $('#stateList').html(data);
            // }
        });

        $(document).on('click', '#cityList', function(e) {
            var txt = $(e.target).text();
            $('#city').fadeIn(txt);
            $('#city').val(txt);
            $('#cityList').fadeOut();
        });

        $(document).ready(function(){
            if (window.location == "http://127.0.0.1:8000/")
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('getAds') }}",
                    method: "GET",
                    data: {_token:_token},
                    success: function(data){
                        $('#Advertisements').html(data);
                        // $('#categories').html(data);
                        //alert(data);
                    }
                });
            }

        });

        $(document).ready(function() {
            $('p img').on('click', function() {
                $('.main').attr('src', $(this).attr('src'));
            });
        });

</script>
