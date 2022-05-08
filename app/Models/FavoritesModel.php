<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritesModel extends Model
{
    use HasFactory;
    protected $table = 'favorites'; /* usamos la tabla favorites de la base de datos */
}
