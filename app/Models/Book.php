<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'thumbnail',
        'author_id',
        'category_id',
        'description'
    ];

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
        return $this->belongsTo(Category::class);
    }


    public function author()
    {
        return $this->belongsTo(Author::class);
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
                    ->orwhere('slug', 'LIKE', '%' . $search . '%')
            )
        );
    }
}
