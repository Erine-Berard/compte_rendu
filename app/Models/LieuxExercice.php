<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuxExercice extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom'];
}
