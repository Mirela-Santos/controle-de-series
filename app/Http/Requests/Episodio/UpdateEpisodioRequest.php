<?php

namespace App\Http\Requests\Episodio;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEpisodioRequest extends FormRequest
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
