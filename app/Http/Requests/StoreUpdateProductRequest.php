<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        /** Pegando valor da URL, no caso o seguimento 2
         * correpondente ao id
         */
        $id = $this->segment(2);

        return [
            // name é único na tabela products 
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'nullable|min:3|max:10000',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            // Em forma de array a passagem de validações
            'image' => ['nullable', 'image']
        ];
    }
}
