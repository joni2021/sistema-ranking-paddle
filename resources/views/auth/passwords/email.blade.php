<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <base href="{{asset('/public')}}">
    <!-- Required meta tags -->
    <meta name="_token" content="{{ csrf_token() }}">
    <title>{{ str_replace("_"," ",env('APP_NAME', 'MDS')) }}</title>

    @include('layouts.css')
</head>

<body class="body-dark">


    <div class="row">
        <div class="col-lg-3 pr-0">
            <div class="card mb-0 shadow-none">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="{{ route("login") }}" class="logo logo-admin"><img src="images/logo.png" height="60" alt="logo" class="my-3"></a>
                    </h3>

                    <div class="px-3">
                        <h4 class="text-muted font-18 mb-2 text-center">Recuperar contraseña</h4>
                        <p class="text-muted text-center">Ingresá tu email y seguí las instrucciones</p>

                        <form class="form-horizontal my-4" action="{{ route("password.email") }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Enviar <i class="fa fa-sign-in ml-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="m-3 text-center p-3 text-primary">
                        <h4 class="">¿La recordás? </h4>
                        <a href="{{ route("login") }}" class="btn btn-secondary waves-effect waves-light">Ingresá ahora</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-9 p-0 h-100vh d-flex justify-content-center">
            <div class="accountbg d-flex align-items-center">
                <div class="account-title text-center text-white">
                    <h4 class="mt-3"><img src="images/logo.png" height="100" alt="logo" class="my-1"></h4>
                    <h1 class="text-white-50">Bien plus qu'un simple club</h1>
                    <div class="border w-25 mx-auto border-warning"></div>
                </div>
            </div>
        </div>
    </div>




@include('layouts.js')
</body>
</html>
