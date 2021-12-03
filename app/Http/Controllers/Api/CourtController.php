<?php


namespace App\Http\Controllers\Api;


use App\Models\Court;

class CourtController
{

    public function index(){

    }

    public function show(){
        $courts = Court::all()->pluck('name','id');

        return response()->json(["success" => true, "data" => $courts]);
    }
}
