@extends('layouts.app')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ $section }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="datatable2" class="table border-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo de partido</th>
                                <th>Cant. Sets</th>
                                <th>Cancha</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $match)
{{--                                {{ dd($match->player()) }}--}}
                                <tr>
                                    <td>{{ $match->id }}</td>
                                    <td>{{ $match->date }}</td>
                                    <td>{{ $match->time }}</td>
                                    <td>{{ $match->doubles }}</td>
                                    <td>{{ $match->sets->count }}</td>
                                    <td>{{ $match->court->name }}</td>
                                    <td>{{ $match->player->full_name }}</td>
                                    <td>{{ $match->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
