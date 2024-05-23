<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'category_id', 
        'maker_id', 
        'model_number', 
        'product_photo',
        'manual_photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
