<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Temporada;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['nome','categoria','streaming','status'];

    public function temporadas(){
        return $this->hasMany(Temporada::class);
    }

    public function alternarStatus(): void{
        if ($this->ehNaoAssistido()) {
            $this->status = 'assistido';
        } else {
            $this->status = 'nao-assistido';
        }
    }

    private function ehNaoAssistido(): bool{
        return ($this->status == 'nao-assistido') ? true : false;
    }
}
