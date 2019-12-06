<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class LivroFormRequest extends FormRequest
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
            'nome' => 'required|min:3|max:100',
            'preco'=> 'required',
            'autor'=> 'required',
            'descricao' => 'min:3|max:1000',
        ];

    }
    public function messages()
    {
        return[
            'nome.required' => 'O Campo Nome é de Preenchimento Obrigatorio',
            'autor.required' => 'O Campo Autpr é de Preenchimento Obrigatorio',
            'preco.required' => 'O Campo Preço é de Preenchimento Obrigatorio',
        ];
    }
}
