<?php

namespace App\Http\Controllers\admin;

use App\Models\Menu;
use App\Models\Table;

use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comande;

class BackTableController extends Controller
{
    public function index()
    {

        $categories = Categorie::all();
        $menus = Menu::all();
        $reservations = Reservation::all();
        $tables = Table::all();
        $comandes = Comande::with('menus')->get();

        return view('admin.tables.index', compact('categories', 'menus', 'reservations', 'tables', 'comandes'));
    }

    public function create()
    {

        return view('admin.tables.create');
    }

    public function store(Request $request)
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location
        ]);

        return redirect()->route('admin')->with('success', 'La table a été crée');
    }

    public function edit(Table $table)
    {

        return view('admin.tables.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $updatearray = ([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location
        ]);

        $table->update($updatearray);

        return redirect()->route('admin')->with('success', 'La table a été modifié');
    }

    public function destroy(Table $table)
    {
        if ($table->reservations()->count() > 0) {
            return redirect()->route('admin')->with('success', 'Attention! :La table a été reservé');
        }
        $table->delete();
        return redirect()->route('admin')->with('success', 'La table a été supprimé');
    }
}
