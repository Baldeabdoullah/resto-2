<?php

namespace App\Http\Controllers\admin;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Comande;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // if (!Gate::allows('access-admin')) {
        //     abort('403');
        // };
        $categories = Categorie::all();
        $menus = Menu::all();
        $reservations = Reservation::all();
        $tables = Table::all();
        $comandes = Comande::with('menus')->get();
        return view('admin.index', compact('categories', 'menus', 'reservations', 'tables', 'comandes'));
    }
}
