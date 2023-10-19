<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdukRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'nama_produk' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'tag' => 'required',
            'image' => 'required'

        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
