<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankDetailRequest extends FormRequest
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
            'user_id' => 'required|string|uuid|exists:users,uuid',
            'accountName' => 'required|string',
            'accountNumber' => 'required|string',
            'bankName' => 'required|string',
            'bankCode' => 'required|string',
        ];
    }
}
