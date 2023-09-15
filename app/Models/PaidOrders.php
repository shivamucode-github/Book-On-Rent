<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PaidOrders extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'book_id'
    ];
}
