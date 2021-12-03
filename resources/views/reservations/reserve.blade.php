@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Reservas</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <fullcalendar-component></fullcalendar-component>
                    <div style='clear:both'></div>
                </div>
            </div>
        </div>
    </div><!-- End row -->

@endsection


