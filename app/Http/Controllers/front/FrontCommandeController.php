<?php

namespace App\Http\Controllers\front;

use App\Models\Menu;
use App\Models\Comande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontCommandeController extends Controller
{
    public function create()
    {
        $menus = Menu::all();
        return view('front.comandes.create', compact('menus'));
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
        return redirect()->route('merci')->with('success', 'Merci votre commande a été enregistré nous vous contacterons');
    }
}
