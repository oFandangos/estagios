<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvisoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'corpo'  => 'required',
            'divulgacao_home_ate' => 'required|date_format:d/m/Y' //antes estava como 'required/data'. ao inves de 'date', o que impedia a criação do aviso
        ];
    }
}
