<?php

namespace App\Http\Requests\Temporada;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemporadaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'serie_id' => 'exists:series,id|required|int',
            'nome'=>'required|min:5'
        ];
    }
}
