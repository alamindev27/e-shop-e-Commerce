<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSummery extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_status'
    ];
}
