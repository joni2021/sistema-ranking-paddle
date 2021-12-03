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

                            <form class="form-horizontal my-4" action="{{ url("register") }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="username">Email</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                                                type="submit">Registrate
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="m-1 text-center p-3 text-primary">
                            <h4 class="">¿Ya estás registrado? </h4>
                            <a href="{{ route('login') }}" class="btn btn-secondary waves-effect waves-light">Ingresá</a>
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






<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@include('layouts.js')
</body>
</html>
