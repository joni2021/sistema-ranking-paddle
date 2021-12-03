<?php

    $module = 'matches';

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
                'date' =>  'required',
                'time' =>  'required',
                'doubles' =>  'required',
                'set_id' =>  'required|exists:sets,id',
                'court_id' =>  'required|exists:courts,id',
                'user_id' =>  'required|exists:users,id'
            ],

        //validaciones de edición

        'validationsUpdate' =>
            [
                'date' =>  'required',
                'time' =>  'required',
                'doubles' =>  'required',
                'set_id' =>  'required|exists:sets,id',
                'court_id' =>  'required|exists:courts,id',
                'user_id' =>  'required|exists:users,id'
            ],

    ];


