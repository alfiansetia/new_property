<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageAttribute($value)
    {
        if ($value && file_exists(public_path('uploads/images/' . $value))) {
            return asset('uploads/images/' . $value);
        } else {
            return asset('frontend/img/property-1.jpg');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
