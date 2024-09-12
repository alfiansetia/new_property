<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImage1Attribute($value)
    {
        if ($value && file_exists(public_path('uploads/images/' . $value))) {
            return asset('uploads/images/' . $value);
        } else {
            return asset('img/default.jpeg');
        }
    }

    public function getImage2Attribute($value)
    {
        if ($value && file_exists(public_path('uploads/images/' . $value))) {
            return asset('uploads/images/' . $value);
        } else {
            return asset('img/default.jpeg');
        }
    }

    public function getImage3Attribute($value)
    {
        if ($value && file_exists(public_path('uploads/images/' . $value))) {
            return asset('uploads/images/' . $value);
        } else {
            return asset('img/default.jpeg');
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
