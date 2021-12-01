<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Temporada;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Episodio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['temporada_id','nome'];

    public function temporada(): BelongsTo{
        return $this->belongsTo(Temporada::class);
    }
}
