<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            'reservation_cost' => ['required'],
            'order_id' => ['required'],
            'reservation_and_orders_cost' => ['required'],
            'add_5_percent_form_cost' => ['required'],
            'add_5_percent_from_5_percent' => ['required'],
            'add_duplicate_of_the_5_percent' => ['required'],
            'total_amount' => ['required'],
            'room_id' => ['required'],
        ];
    }
}
