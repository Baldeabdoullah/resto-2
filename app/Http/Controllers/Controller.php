<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
