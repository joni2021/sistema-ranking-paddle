<?php
    Route::group(['prefix'=> 'formulario-144M'], function(){

        Route::get('index', [
            'as' => 'form144.index',
            'uses' => 'Form144Controller@index'
        ]);

        Route::get('create/{id?}', [
            'as' => 'form144.create',
            'uses' => 'Form144Controller@create'
        ]);

        Route::post('store', [
            'as' => 'form144.store',
            'uses' => 'Form144Controller@store'
        ]);

        Route::get('{cod_provincia}', [
            'as' => 'form144.localidadesByProvincia',
            'uses' => 'Form144Controller@getLocalidadesByProvincia'
        ]);

        Route::group(['prefix' => '{id?}'], function() {

            Route::get('edit', [
                'as' => 'form144.edit',
                'uses' => 'Form144Controller@edit'
            ]);

            Route::get('show', [
                'as' => 'form144.show',
                'uses' => 'Form144Controller@show'
            ]);

            Route::post('udpate', [
                'as' => 'form144.update',
                'uses' => 'Form144Controller@update'
            ]);
            Route::get('destroy', [
                'as' => 'form144.destroy',
                'uses' => 'Form144Controller@destroy'
            ]);

        });
    });