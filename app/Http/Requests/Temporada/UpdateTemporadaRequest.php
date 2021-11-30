<?php

namespace App\Http\Requests\Temporada;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemporadaRequest extends FormRequest
{

    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'nome'=>'required|min:5'
        ];
    }
}
