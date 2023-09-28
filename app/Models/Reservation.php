<?php

namespace App\Models;

use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;
    protected  $guarded = [];


    // pour convertir la date de reservation au format DateTime
    protected $casts = [
        'res_date' => 'datetime',
    ];



    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
