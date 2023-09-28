<?php

namespace App\Http\Controllers\admin;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comande;

class BackMenuController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $menus = Menu::orderBy('created_at', 'desc')->get();
        $reservations = Reservation::all();
        $tables = Table::all();
        $comandes = Comande::with('menus')->get();
        return view('admin.menus.index', compact('categories', 'menus', 'reservations', 'tables', 'comandes'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $imageName = $request->image->store('posts');
        Menu::create([
            'categorie_id' => $request->categorie_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName

        ]);

        return redirect()->route('admin')->with('success', 'Le menu a été crése');
    }

    public function edit(Menu $menu)
    {

        $categories = Categorie::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {


        $updatearray = ([
            'categorie_id' => $request->categorie_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->image != null) {
            $imageName = $request->image->store('posts');
            $updatearray = array_merge($updatearray, ([
                'image' => $imageName
            ]));
        }

        $menu->update($updatearray);
        return redirect()->route('admin')->with('success', 'Le menu a été mofifié');
    }

    public function destroy(Menu $menu)
    {

        $menu->delete();
        return redirect()->route('admin')->with('success', 'Le menu a été supprimé');
    }
}
