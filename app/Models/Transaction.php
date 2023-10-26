<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = [
        'amount',
        'description',
        'payment_started_datetime',
        'payment_valid_untill_datetime',
        'payment_due_datetime',
        'active',
    ];
}
