<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserKYCRequest extends FormRequest
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
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phoneNumber' => 'required|numeric',
            'relationship' => 'required|string',
            'nextOfKinAddress' => 'required|string',
            'nextOfKinState' => 'required|string',
            'position' => 'required|string',
            'natureOfBusiness' => 'required|string',
            'officeAddress' => 'required|string',
            'officeCity' => 'required|string',
            'officeState' => 'required|string',
        ];
    }
}
