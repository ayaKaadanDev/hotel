<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryStoreRequest extends FormRequest
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
            'employee_id' => ['required'],
            'salary' => ['required'],
            'additional_name' => ['required'],
            'additional_quantity' => ['required'],
            'severance_name' => ['required'],
            'severance_quantity' => ['required'],
            'net_payment' => ['required'],
        ];
    }
}
