<?php

    Route::get('consultaAfip/{cuit}','AjaxController@consultaAfip');

    Route::get('consultaRenaper/{dni}/{sexo}','AjaxController@consultaRenaper');

    Route::get('puntuacion/{id}','AjaxController@puntuacionFichaOrganizaciones');