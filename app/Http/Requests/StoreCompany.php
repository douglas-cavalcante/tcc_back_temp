<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
{

    protected $stopOnFirstFailure = true;

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
            'name' => 'required|string',
            'company_name' => 'required|string',
            'category_id' => 'required|int',
            'type_id' => 'required|int',
            'size_id' => 'required|int',
            'cnpj' => 'required|string|unique:companies,cnpj',
            'email' => 'required|string|email|unique:users,email',
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'company_name.required' => 'O campo nome da empresa é obrigatório.',
            'category_id.required' => 'Selecione uma categoria.',
            'type_id.required' => 'Selecione um tipo.',
            'size_id.required' => 'Selecione um tamanho.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.unique' => 'Este CNPJ já está sendo utilizado por outra empresa.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está registrado por outra empresa.',
            'description.required' => 'O campo descrição é obrigatório.',
        ];
    }
}
