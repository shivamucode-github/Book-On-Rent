<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, Sluggable,SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'thumbnail',
        'author_id',
        'category_id',
        'description',
        'stock',
        'rank'
    ];

    protected $with = ['category', 'user', 'author'];

    // getter
    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    protected function Price(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value . ".00",
        );
    }


    // Add Slug
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // Thumbnail Store
    public static function storeImage($image)
    {
        if ($image) {
            $imageName = md5_file($image);
            return $image->storeAs('images', $imageName . '.png', 'public');
        }
        return null;
    }


    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }


    public function author()
    {
        return $this->belongsTo(Author::class)->withTrashed();
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // Filters
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orwhere(
                        fn ($query) =>
                        $query->whereHas(
                            'category',
                            fn ($query) =>
                            $query->where('name', 'LIKE', '%' . $search . '%')
                        )
                            ->orwhereHas(
                                'author',
                                fn ($query) =>
                                $query->where('name', 'LIKE', '%' . $search . '%')
                            )
                    )
            )
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('slug', $author)
            )
        );
    }
}
