<?php

namespace App\Repositories;

use App\Models\PlacesModel; /* usamos el modelo PlacesModel para tener la tabla places */

/**
 * Class PlacesRepository.
 */
class PlacesRepository
{

    public function all(){

        /* esta función devuelve toda la información que contiene el modelo PlacesModel, es decir todos los lugares que hay en la tabla places */

        return PlacesModel::all();
    }

    public function random(){

        /* esta funcion devuelve de forma aleatoria 8 lugares de la tabla places */

        return PlacesModel::all()->random(8);
    }

}
