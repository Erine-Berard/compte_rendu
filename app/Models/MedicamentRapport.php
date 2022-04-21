<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentRapport extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'idMedicament', 'idRapport', 'quantite'];
}
