<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    /**
     * One to many (inverse) relationship.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * One to many (inverse) relationship.
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Many to many relationship.
     */
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * One to one polymorphic.
     */
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
