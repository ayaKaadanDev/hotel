<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'salary',
        'additional_name',
        'additional_quantity',
        'severance_name',
        'severance_quantity',
        'net_payment',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
