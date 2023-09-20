<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'book_id',
        'price',
        'days',
        'quantity',
        'return_at',
        'balance'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function paidOrder()
    {
        return $this->hasOne(PaidOrder::class, 'order_id');
    }

    public function bookStockUpdate()
    {
        $book = Book::find($this->book_id);
        $book->update(['stock' => $book->stock - $this->quantity]);
        return 1;
    }
}
