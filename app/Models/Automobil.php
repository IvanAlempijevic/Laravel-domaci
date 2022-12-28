<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobil extends Model
{
    use HasFactory;

    protected $table = 'automobili';

    protected $fillable = ['markaID', 'model', 'karoserijaID', 'cena', 'brojVrata'];
}
