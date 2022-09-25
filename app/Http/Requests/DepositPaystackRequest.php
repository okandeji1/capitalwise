<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositPaystackRequest extends FormRequest
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
            'category' => 'required|string|exists:savings_categories,category',
            'amount' => 'required|numeric',
            'frequency' => 'required|string',
            'period' => 'required|numeric',
            'callback_url' => 'required|string',
        ];
    }
}
