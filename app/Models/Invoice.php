<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;

    use SoftDeletes;

    use SoftDeletes;

    protected $fillable = [
        'reservation_cost',
        'order_id',
        'reservation_and_orders_cost',
        'add_5_percent_form_cost',
        'add_5_percent_from_5_percent',
        'add_duplicate_of_the_5_percent',
        'total_amount',
        'room_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function iteam()
    {
        return $this->belongsTo(Iteam::class);
    }

}
