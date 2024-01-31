<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;

    use SoftDeletes;


    protected $fillable = [
        'number',
        'floor',
        'beds_number',
        'status',
    ];


    public function reserve()
    {
        return $this->hasMany(Reservation::class);
    }

    public function securityCard()
    {
        return $this->hasMany(SecurityCard::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

}
