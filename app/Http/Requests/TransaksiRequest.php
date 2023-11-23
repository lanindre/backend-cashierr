<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TransaksiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tanggal' => 'required',
            'total_harga' => 'required',
            'metode_pembayaran' => 'required',
            'keterangan' => 'required'
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
