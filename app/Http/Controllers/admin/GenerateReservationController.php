<?php

namespace App\Http\Controllers\admin;

use App\Models\Menu;

use App\Models\Table;
use App\Models\Comande;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use PDF;

class GenerateReservationController extends Controller
{
    public function imprime()
    {

        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        $tables = Table::all();


        $pdf = PDF::loadView('admin.reservations.pdf', compact('reservations', 'tables'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }

    public function index()
    {

        $categories = Categorie::all();
        $menus = Menu::all();
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        $tables = Table::all();
        $comandes = Comande::with('menus')->get();
        return view('admin.reservations.pdf', compact('categories', 'menus', 'reservations', 'tables', 'comandes'));
    }
}
