<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $this->data['datas'] = $this->repo->getAllPaginated(config($this->confFile.".paginate"));
        return view(config($this->confFile.".viewIndex"))->with($this->data);
    }

    public function create()
    {
        return view(config($this->confFile.".viewForm"))->with($this->data);
    }

    public function store(Request $request)
    {
        //validacion del formulario
        $request->validate(config($this->confFile.'.validationsStore'));

        $this->repo->create($request->all());

        return redirect()->route(config($this->confFile.".viewIndex"))->with(['ok' => 'Registro Creado.']);
    }

    public function edit()
    {
        $this->data['model']= $this->repo->find($this->route->id);

        return view(config($this->confFile.".viewForm"))->with($this->data);
    }

    public function update(Request $request)
    {
        $request->validate(config($this->confFile.'.validationsUpdate'));

        $model = $this->repo->find($this->route->id);

        $model->fill($request->all());

        //updateables
        if(config($this->confFile.'.updateable'))
        {
            $diffs = array_diff($model->getAttributes(),$model->getOriginal());
            foreach ($diffs as $diff => $a)
            {
                $col = $diff;
                $model->Updateables()->create(['users_id' => Auth::user()->id, 'column' => $col, 'new_data' => $model->$diff, 'old_data' => $model->getOriginal($diff)]);
            }
        }

        $model->save();

        return redirect()->route(config($this->confFile.".viewIndex"))->with(["ok" => 'Registro Editado.']);
    }

    public function destroy()
    {
        $model = $this->repo->find($this->route->id);

        $model->delete();

        return redirect()->route(config($this->confFile.".viewIndex"))->with(["ok" => 'Registro Borrado.']);
    }

    public function  show()
    {
        $this->data['model']= $this->repo->find($this->route->id);

        return view(config($this->confFile.".viewShow"))->with($this->data);
    }
}
