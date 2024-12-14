<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    // Định nghĩa các cột có thể điền (fillable)
    protected $fillable = ['title', 'content'];
}
