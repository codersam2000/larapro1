<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class Post extends Model
{
    use HasFactory;
     protected $fillable = [
        'user_id',
        'title',
        'des',
        'slug',
        'category_id',
        'image',
        'status'
     ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
