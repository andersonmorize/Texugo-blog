<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Campo nome é obrigatorio!',
            '*.string' => 'Tipo inválido!',
            'name.max' => 'O tamanho máximo é 255 caracteres!',
            'password.min' => 'Quantidade minima de caracteres é 8',
            'password' => 'As senhas não são indenticas!',
        ];
    }
}
