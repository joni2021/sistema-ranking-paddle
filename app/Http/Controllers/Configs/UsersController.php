<?php

namespace App\http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\RolesRepo;
use App\Http\Repositories\Configs\UsersRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UsersController extends Controller
{
    protected $repo;
    protected $module;
    protected $route;

    public function __construct( Repo $repo, Route $route, RolesRepo $rolesRepo )
    {
        $this->repo = $repo;
        $this->route = $route;
        $confFile = 'configs.users';
        // nombre de archivo de configuracion

        $this->confFile = $confFile;
        $this->data['confFile'] = $confFile;

        $this->data['roles'] = $rolesRepo->select();
    }

    public function store(Request $request)
    {
        //validacion del formulario
        $request->validate(config($this->confFile.'.validationsStore'));

        $model = $this->repo->create($request->all());
        $model->assignRole([$request->roles_id]);

        return redirect()->route(config($this->confFile.".viewIndex"))->withErrors('Registro Creado.');
    }

    public function update(Request $request)
    {
        $request->validate(config($this->confFile.'.validationsUpdate'));

        $model = $this->repo->find($this->route->id);


        $model->fill($request->except('password'));

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

        $model->syncRoles([$request->roles_id]);

        return redirect()->route(config($this->confFile.".viewIndex"))->withErrors('Registro Editado.');
    }
}
