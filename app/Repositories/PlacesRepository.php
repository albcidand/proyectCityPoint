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

    public function random(){
        return PlacesModel::all()->random(4);
    }

    public function getById($place_id){
        return PlacesModel::find($place_id);
    }
}
