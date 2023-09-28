<?php

namespace App\Http\Controllers\admin;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Comande;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackCategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $menus = Menu::all();
        $reservations = Reservation::all();
        $tables = Table::all();
        $comandes = Comande::with('menus')->get();
        return view('admin.categories.index', compact('categories', 'menus', 'reservations', 'tables', 'comandes'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $imageName = $request->image->store('posts');
        Categorie::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('admin')->with('success', 'La categorie a été crée');
    }

    public function edit(Categorie $category)
    {

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Categorie $category)
    {

        $updatearray = ([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if ($request->image != null) {
            $imageName = $request->image->store('posts');
            $updatearray = array_merge($updatearray, ([
                'image' => $imageName
            ]));

            $category->update($updatearray);

            return redirect()->route('admin')->with('success', 'La categorie a été mise à jour');
        }
    }

    public function destroy(Categorie $category)
    {
        if ($category->menus()->count() > 0) {
            return redirect()->route('admin')->with('success', ' Attention! :La Cathegorie contient des menus');
        }

        $category->delete();

        return redirect()->route('admin')->with('success', 'La categorie a été supprimé');
    }
}
