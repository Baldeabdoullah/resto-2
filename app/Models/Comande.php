<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comande extends Model
{
    use HasFactory;
    protected  $guarded = [];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'commande_menu', 'commande_id', 'menu_id');
    }

    public function HasMenu($menu)
    {
        return $this->menus->contains($menu);
    }
}
