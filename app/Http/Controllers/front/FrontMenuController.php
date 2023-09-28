<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class FrontMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('front.menus.index', compact('menus'));
    }
}
