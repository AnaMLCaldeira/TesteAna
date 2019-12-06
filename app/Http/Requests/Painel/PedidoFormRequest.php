<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class PedidoFormRequest extends FormRequest
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
            'data_pedido' => 'required|date',
            'observacao' => 'required|min:3|max:1000',

        ];

    }

    public function messages()
    {
        return [
            'data_pedido.required' => 'Preencher Data de Pedido',
            'observacao.required' => 'O Campo Comentario é de Preenchimento Obrigatorio',

        ];

    }
}
