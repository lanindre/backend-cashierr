<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DetailTransaksiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
           'transaksi' => 'required',
           'menu' => 'required',
           'jumlah' => 'required',
           'subtotal' => 'required' 
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
