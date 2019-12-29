<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:5',
            'body' => 'required|string'

        ];
    }
    public function messages()
    {
        return [
            '*.required' => 'Campo é obrigatório',
            '*.string' => 'Tipo de dado inválido',
            'title.min' => 'Tamanho minimo é 5 caracteres',
            'title.max' => 'Tamanho máximo é 255 caracteres',

        ];
    }
}
