<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
            'search' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'search.required' => 'Campo é obrigatorio!',
            'search.string' => 'Tipo inválido!',
            'search.max' => 'O tamanho máximo é 255 caracteres!',
        ];
    }
}
