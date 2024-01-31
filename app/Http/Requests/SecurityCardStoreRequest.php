<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecurityCardStoreRequest extends FormRequest
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
            'user_id' => ['required'],
            'fathers_name' => ['required'],
            'mothers_name' => ['required'],
            'place_of_birth' => ['required'],
            'date_of_birth' => ['required'],
            'nationality' => ['required'],
            'profassion' => ['required'],
            'domicile' => ['required'],
            'no_of_identity_or_passport' => ['required'],
            'date_of_identity_or_passport' => ['required'],
            'issued_of_identity_or_passport' => ['required'],
            'arrive_from' => ['required'],
            'date_of_arrive' => ['required'],
            'date_of_depart' => ['required'],
            'room_id' => ['required'],
        ];
    }
}
