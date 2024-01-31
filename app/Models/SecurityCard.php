<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecurityCard extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
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
        'date_of_depart',
        'room_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
