<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = ['serie_id','nome'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}
