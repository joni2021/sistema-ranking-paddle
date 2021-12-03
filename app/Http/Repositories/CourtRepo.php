<?php

namespace App\Http\Repositories;

use App\Http\Repositories\BaseRepo;
use App\Models\Court;

class CourtRepo extends BaseRepo
{
    public function getModel()
    {
        return new Court();
    }


}
