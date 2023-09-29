<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaidOrder extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'order_id'
    ];

    protected $table = 'paid_orders';
    protected $with = [
        'payment'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class,'transaction_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
