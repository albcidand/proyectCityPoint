<?php

namespace App\Repositories;

use App\Models\PlacesModel;

/**
 * Class PlacesRepository.
 */
class PlacesRepository
{
    public function all(){
        return PlacesModel::all();
    }
}
