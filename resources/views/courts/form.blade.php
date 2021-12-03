@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Canchas</h4>
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
                        <div class="form-group col-12 col-md-6">
                            <label for="example-email-input1" class="col-form-label">Nombre</label>
                            <div class="">
                                {{Form::text("name",null,["class"=> "form-control"])}}
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
    <!-- Required datatable js -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="plugins/datatables/jszip.min.js"></script>
    <script src="plugins/datatables/pdfmake.min.js"></script>
    <script src="plugins/datatables/vfs_fonts.js"></script>
    <script src="plugins/datatables/buttons.html5.min.js"></script>
    <script src="plugins/datatables/buttons.print.min.js"></script>
    <script src="plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="pages/jquery.table-datatable.js"></script>


@endsection
