<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        return [
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'cpf' => [
                'required',
                'cpf',
                Rule::unique('contacts','cpf')->where(fn (Builder $query) => $query->where('user_id', Auth::user()->id))
            ],
            'cep' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Campo :attribute obrigatório',
            'sobrenome.required' => 'Campo :attribute obrigatório',
            'telefone.required' => 'Campo :attribute obrigatório',
            'cpf.required' => 'Campo :attribute obrigatório', 
            'cpf.cpf' => ':attribute inválido', 
            'endereco.required' => 'Campo :attribute obrigatório',
            'cep.required' => 'Campo :attribute obrigatório',
        ];
    }


}
