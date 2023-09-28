<?php

namespace App\Http\Controllers\admin;

use App\Enums\TableStatus;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Comande;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Carbon\Carbon;

class backReservationController extends Controller
{
    public function index()
    {
        // $reservation = Reservation::find(10);
        // $reservation->delete();
        // $reservations = Reservation::withTrashed()->where('id', 10)->restore();
        // dd($reservations);
        $categories = Categorie::all();
        $menus = Menu::all();
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        $tables = Table::all();
        $comandes = Comande::with('menus')->get();
        return view('admin.reservations.index', compact('categories', 'menus', 'reservations', 'tables', 'comandes'));
    }

    public function create()
    {
        $tables = Table::where('status', TableStatus::Disponible)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        // On appelle la table que l'on reserve actuellement
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('error', 'Le nombre de place est insuffisant pour cette table');
        }

        //on selectionne la date de reservation de la  Table qui est actuellement requise
        $request_date = Carbon::parse($request->res_date);

        // on verifie que toutes les reservations affilie a cette table on des dates differantes de celle de la reservation actuelle
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('error', 'Cette Table est reservé pour ce jour veuillez choisir une autre date');
            }
        };


        Reservation::create([
            'table_id' => $request->table_id,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'last_name' => $request->last_name,
            'tel_number' => $request->tel_number,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number
        ]);

        return redirect()->route('admin')->with('success', 'La reservation a été cree');
    }

    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Disponible)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(Request $request, Reservation $reservation)
    {

        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('error', 'Le nombre de place est insuffisant pour cette table');
        }

        //on selectionne la date de reservation de la  Table qui est actuellement requise
        $request_date = Carbon::parse($request->res_date);

        // on verifie que toutes les reservations affilie a cette table on des dates differantes de celle de la reservation actuelle
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('error', 'Cette Table est reservé pour ce jour veuillez choisir une autre date');
            }
        };


        $updatearray = ([
            'table_id' => $request->table_id,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'last_name' => $request->last_name,
            'tel_number' => $request->tel_number,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number

        ]);

        $reservation->update($updatearray);

        return redirect()->route('admin')->with('success', 'La reservation a été modifié');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin')->with('success', 'La reservation a été supprimé');
    }
}
