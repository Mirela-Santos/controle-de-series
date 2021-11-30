<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Temporada extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['serie_id','nome'];

    public function serie(): BelongsTo{
        return $this->belongsTo(Serie::class);
    }
}
