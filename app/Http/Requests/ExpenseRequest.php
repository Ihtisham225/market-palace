<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'amount' => 'required',
            'paid_by' => 'required',
            'paid_to' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'amount' => 'Amount',
            'paid_by' => 'Paid By',
            'paid_to' => 'Paid To',
        ];
    }
}
