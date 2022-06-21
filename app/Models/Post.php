<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'thumbnail', 'body', 'category_id'];

    protected $attributes = [
        'thumbnail' => 'https://ui-avatars.com/api/?name=img&length=3&color=7F9CF5&background=EBF4FF',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhereHas('author', fn ($query) =>
                        $query->where('name', 'like', '%' . $search . '%')
                    )
                    ->orWhereHas('category', fn ($query) =>
                        $query->where('name', 'like', '%' . $search . '%')
                    )
            )
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
