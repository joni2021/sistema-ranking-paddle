<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <base href="{{asset('/public')}}">
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ str_replace("_"," ",env('APP_NAME', 'MDS')) }}</title>

    @include('layouts.css')

    @yield('css')
</head>

<body>

@include('layouts.topbar')

<div class="page-wrapper" id="app">
    <!-- Left Sidenav -->
@include('layouts.sidebar')
<!-- End Left Sidenav -->

    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">

            <div class="row mt-4">
                <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-0"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="mdi mdi-close-circle mr-2"></i>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has("ok"))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="mdi mdi-check-circle mr-2"></i> {{ \Illuminate\Support\Facades\Session::get('ok') }}
                        </div>
                    @endif
                </div>
            </div>


            @yield('content')


        </div>
    </div>


    @include('layouts.footer')
</div>


@include('layouts.js')

@yield('js')
</body>

</html>
