<?php

namespace App\Http\Controllers\admin;

use App\Models\Menu;
use App\Models\Table;


use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comande;

class ComandeController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $menus = Menu::all();
        $reservations = Reservation::all();
        $tables = Table::all();
        $comandes = Comande::with('menus')->get();

        return view('admin.comandes.index', compact('categories', 'menus', 'reservations', 'tables', 'comandes'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.comandes.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $comande = Comande::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'adress' => $request->adress
        ]);

        $comande->menus()->attach($request->menus);

        return redirect()->route('admin')->with('success', 'La commande a été cree');
    }

    public function edit(Comande $comande)
    {
        $menus = Menu::all();
        return view('admin.comandes.edit', compact('comande', 'menus'));
    }

    public function update(Request $request, Comande $comande)
    {
        $arrayUpdate = ([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'adress' => $request->adress
        ]);

        $comande->update($arrayUpdate);
        $comande->menus()->sync($request->menus);
        return redirect()->route('admin')->with('success', 'La commande a été modifié');
    }

    public function destroy(Comande $comande)
    {

        $comande->menus()->detach();
        $comande->delete();
        return redirect()->route('admin')->with('success', 'La commande a été supprimé');
    }
}
