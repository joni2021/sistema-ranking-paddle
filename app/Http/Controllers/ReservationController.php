<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Repositories\ReservationRepo as Repo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{

    protected $repo;
    protected $module;
    protected $route;
    protected $confFile;


    public function __construct(Repo $repo, Route $route)
    {
        $this->repo = $repo;
        $this->route = $route;
        $confFile = 'reservation';

        // nombre de archivo de configuracion

        $this->confFile = $confFile;
        $this->data['confFile'] = $confFile;

        $this->data['section'] = "Reservaciones";
    }


    public function index(Request $request)
    {

        $this->data['datas'] = $this->repo->getModel()->with('User','Court')->get();

        return view(config($this->confFile.".viewIndex"))->with($this->data);
    }


    public function reserve(Request $request)
    {

        if($request->isXmlHttpRequest()){
            $reservations = $this->repo->getModel()->with('user','court')->get();

            return response()->json(["success" => true, "response" => $reservations]);
        }

        return view("reservations.reserve");
    }

    public function store(Request $request)
    {
        $req = $request;
        if($request->isXmlHttpRequest()){

            $data = [
                "day"       => Carbon::createFromTimestamp(strtotime($request->day))->format("Y/m/d"),
                "from"      => Carbon::createFromTimestamp(strtotime($request->from))->format("H:i:s"),
                "to"        => Carbon::createFromTimestamp(strtotime($request->to))->format("H:i:s"),
                "court_id"  => $request->court_id,
                "user_id"  => $request->user()->id
            ];

            $req = collect($data);
        }

        //validacion del formulario
        Validator::make($req->all(),config($this->confFile.'.validationsStore'));

        $this->repo->create($req->all());

        if($request->isXmlHttpRequest()){
            $data = [
                "success" => true
            ];

            return response()->json($data);
        }
        return redirect()->route(config($this->confFile.".viewIndex"))->with(['ok' => 'Registro Creado.']);
    }

}
