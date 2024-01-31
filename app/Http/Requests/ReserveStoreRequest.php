<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\timeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReserveStoreRequest extends FormRequest
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
            'date' => ['required','date' , new DateBetween , new timeBetween],
            'room_id' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
