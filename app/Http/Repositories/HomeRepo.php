<?php

namespace App\Http\Repositories;

use App\Entities\Home;
use App\Http\Repositories\BaseRepo;

class HomeRepo extends BaseRepo
{
    public function getModel()
    {
        return new Home();
    }


}