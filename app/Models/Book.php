<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'book_id',
        'title',
        'author',
        'category',
        'isbn',
        'quantity',
        'available_copies',
        'status',
    ];

    public function issues(): HasMany
    {
        return $this->hasMany(BookIssue::class);
    }
}