<?php

    $module = 'courts';

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
                'name' =>  'required|string'
            ],

        //validaciones de edición

        'validationsUpdate' =>
            [
                'name' =>  'required|string'
            ],

    ];


