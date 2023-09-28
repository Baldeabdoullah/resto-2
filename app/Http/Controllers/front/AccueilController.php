<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Menu;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $particularMenu = Menu::where('id', '=', 13)->get();
        $lastMenus = Menu::orderBy('created_at', 'desc')->limit(4)->get();
        $randomMenus = Menu::inRandomOrder()->limit(4)->get();
        $categories = Categorie::all();
        return view('accueil', compact('categories', 'randomMenus', 'lastMenus', 'particularMenu'));
    }

    public function show($categorie_id)
    {
        $menus = Menu::where('categorie_id', '=', $categorie_id)->get();
        return view('front.categories.index', compact('menus'));
    }
}
