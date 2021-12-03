<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Repositories\CourtRepo as Repo;
use Illuminate\Support\Facades\Auth;

class CourtController extends Controller
{

    protected $repo;
    protected $module;
    protected $route;


    public function __construct(Repo $repo, Route $route)
    {
        $this->repo = $repo;
        $this->route = $route;
        $confFile = 'court';

        // nombre de archivo de configuracion

        $this->confFile = $confFile;
        $this->data['confFile'] = $confFile;

        $this->data['section'] = "Canchas";
    }

    public function index(Request $request)
    {

        if($request->ajax()){
            $courts = $this->repo->getAll()->pluck('name','id');

            return response()->json(["success" => true, "response" => ["courts" => $courts,"user" => Auth::user()]]);
        }

        return parent::index($request);
    }



}
