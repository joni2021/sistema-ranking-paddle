@extends('layouts.app')

@section("css")
{{--    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />--}}
    <link href="plugins/jquery-timepicker/jquery-timepicker.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ $section }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if(isset($model))
                        {!! Form::model($model,['route'=>[config($confFile.'.routeUpdate'),$model->id]]) !!}
                    @else
                        {!! Form::open(['route'=> config($confFile.'.routeStore')]) !!}
                    @endif

                    <div class="row">
                        <div class="form-group col-6 col-md-3">
                            <label for="example-email-input1" class="col-form-label">Fecha</label>
                            <div class="">
                                {{Form::text("date",null,["class"=> "form-control datepicker"])}}
                            </div>
                        </div>
                        <div class="form-group col-6 col-md-3">
                            <label for="example-email-input1" class="col-form-label">Hora</label>
                            <div class="">
                                {{Form::text("time",null,["class"=> "form-control timepicker"])}}
                            </div>
                        </div>
                        <div class="form-group col-6 col-md-3">
                            <label for="example-email-input1" class="col-form-label">Tipo de partido</label>
                            <div class="">
                                {{Form::select("double",['single', "double"],null,["class"=> "form-control"])}}
                            </div>
                        </div>
                        <div class="form-group col-6 col-md-3">
                            <label for="example-email-input1" class="col-form-label">Sets</label>
                            <div class="">
                                {{Form::select("set_id",$sets,null,["class"=> "form-control"])}}
                            </div>
                        </div>
                        <div class="form-group col-6 col-md-3">
                            <label for="example-email-input1" class="col-form-label">Cancha</label>
                            <div class="">
                                {{Form::select("court_id",$courts,null,["class"=> "form-control"])}}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary px-4">Crear</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div><!--end row-->


@endsection

@section('js')
    <script src="plugins/jquery-timepicker/jquery-timepicker.js" type="text/javascript"></script>

@endsection
