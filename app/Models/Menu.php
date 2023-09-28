<?php

namespace App\Models;

use App\Models\Comande;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected  $guarded = [];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function comandes()
    {
        return $this->belongsToMany(Comande::class, 'commande_menu', 'menu_id', 'commande_id');
    }
}
