<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $fillable = [
        'user_id',
        'slug',
        'transaction_id',
        'status',
        'amount'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'transaction_id'
            ]
        ];
    }
}
