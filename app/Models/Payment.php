<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'user_id',
        'slug',
        'transaction_id',
        'status',
        'amount',
        'description'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'transaction_id'
            ]
        ];
    }

    public function paidPayments()
    {
        return $this->hasMany(PaidOrder::class, 'transaction_id');
    }

    public function orderAssigned()
    {
        return $this->belongsToMany(Order::class, 'paid_orders', 'transaction_id')->onlyTrashed()->withTimestamps();
    }

    public function getOrderAttribute()
    {
        return implode(',#', collect($this->orderAssigned->pluck('order_num')->toArray())->unique()->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
