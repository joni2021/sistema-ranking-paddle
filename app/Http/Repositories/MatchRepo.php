<?php

namespace App\Http\Repositories;

use App\Http\Repositories\BaseRepo;
use App\Models\Match;

class MatchRepo extends BaseRepo
{
    public function getModel()
    {
        return new Match();
    }


}
