<?php

namespace App\Http\Controllers\front;

use Carbon\Carbon;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontReservationController extends Controller
{
    public function create()
    {
        $tables = Table::where('status', TableStatus::Disponible)->get();
        return view('front.reservations.create', compact('tables'));
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

        return redirect()->route('merci')->with('success', 'Merci Votre reservation a été faite nous vous contacterons');
    }
}
