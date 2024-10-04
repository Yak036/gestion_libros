<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'published_year',
        'gender',
        'description',
        'slug',
        'cover_image',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}