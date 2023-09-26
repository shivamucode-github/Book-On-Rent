<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_num',
        'book_id',
        'price',
        'days',
        'quantity',
        'return_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id')->withTrashed();
    }

    public function paidOrder()
    {
        return $this->hasOne(PaidOrder::class, 'order_id')->withTrashed();
    }

    public function bookStockUpdate()
    {
        $book = Book::find($this->book_id);
        $book->update(['stock' => $book->stock - $this->quantity]);
        return 1;
    }
}
