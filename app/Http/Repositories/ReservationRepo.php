<?php

namespace App\Http\Repositories;

use App\Http\Repositories\BaseRepo;
use App\Models\Reservation;

class ReservationRepo extends BaseRepo
{
    public function getModel()
    {
        return new Reservation();
    }


}
