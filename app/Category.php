<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Category extends Model
{
    protected $fillable = ['name','slug'];

    public function blog() {
        return $this->belongsToMany(Blog::class);
    }
}
