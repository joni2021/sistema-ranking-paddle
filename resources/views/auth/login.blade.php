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

<!-- Log In page -->
<div class="row">
    <div class="col-lg-5 col-xl-3 col-12 pr-0">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-12">

                <div class="card mb-0 shadow-none">
                    <div class="card-body py-0">

                        <h3 class="text-center m-0">
                            <a href="{{ route('login') }}" class="logo logo-admin"><img src="images/logo.png"
                                                                                        height="60" alt="logo"
                                                                                        class="my-3"></a>
                        </h3>

                        <div class="px-3">
                            <h4 class="text-muted font-18 mb-2 text-center">Bienvenido</h4>
                            <p class="text-muted text-center">Ingresá tus datos para acceder</p>

                            <form class="form-horizontal my-4" action="{{ route("login") }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="username">Usuario</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input id="username" type="text"
                                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                               name="username" value="{{ old('username') }}"
                                               placeholder="Ingrese su usuario" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                    class="fa fa-key"></i></span>
                                        </div>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="************" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customControlInline">
                                            <label class="custom-control-label"
                                                   for="customControlInline">Recordarme</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="{{ route('password.request') }}" class="text-muted font-13"><i
                                                class="mdi mdi-lock"></i> ¿Olvidaste tu password?</a>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                                type="submit">Entrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="m-1 text-center p-3 text-primary">
                            <h4 class="">¿No tenés una cuenta? </h4>
                            <a href="{{ route('register') }}" class="btn btn-secondary waves-effect waves-light">Registrate gratis</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-7 col-xl-9 d-none p-0 h-100vh d-lg-flex justify-content-center">
        <div class="accountbg d-flex align-items-center">
            <div class="account-title text-center text-white">
                <h4 class="mt-3"><img src="images/logo.png" height="100" alt="logo" class="my-1"></h4>
                <h1 class="text-white-50">Bien plus qu'un simple club</h1>
                <div class="border w-25 mx-auto border-warning"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Log In page -->
@include('layouts.js')
</body>
</html>
