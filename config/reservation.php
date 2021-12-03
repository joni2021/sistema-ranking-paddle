<?php

    $module = 'reservations';

    return [

        'paginate' => '50',
        'updateable' => true,


        //directorio de las vistas

        'viewIndex' => $module . '.index',
        'viewForm' => $module . '.form',
        'viewShow' => $module . '.show',

        //rutas del modulo

        'routeCreate' => $module . '.create',
        'routeEdit' => $module . '.edit',
        'routeUpdate' => $module . '.update',
        'routeStore' => $module . '.store',
        'routeDestroy' => $module . '.destroy',
        'routeShow' => $module . '.show',


        //validaciones de creación

        'validationsStore' =>
            [
                'day' =>  'required',
                'from' =>  'required',
                'to' =>  'required',
                'court_id' =>  'required|exists:courts,id',
            ],

        //validaciones de edición

        'validationsUpdate' =>
            [
                'day' =>  'required',
                'from' =>  'required',
                'to' =>  'required',
                'court_id' =>  'required|exists:courts,id',
            ],

    ];


