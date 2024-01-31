<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'fathers_name',
        'mothers_name',
        'place_of_birth',
        'date_of_birth',
        'nationality',
        'profassion',
        'domicile',
        'no_of_identity_or_passport',
        'date_of_identity_or_passport',
        'issued_of_identity_or_passport',
        'arrive_from',
        'date_of_arrive',
        'phone_number',
        'word_hours',
    ];

    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
}
