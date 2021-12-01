<?php

namespace App\Http\Requests\Episodio;

use Illuminate\Foundation\Http\FormRequest;

class IndexEpisodioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'temporada_id' => 'exists:temporadas,id|required|int'
        ];
    }
}
