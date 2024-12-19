<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class issue extends Model
{
    use HasFactory;

    // Định nghĩa các cột có thể điền (fillable)
    protected $fillable = ['computer_id','reported_by', 'reported_date', 'urgency','status'];

    // Định nghĩa mối quan hệ 1-N với bảng computers
    public function computer(){
        return $this->belongsTo(computer::class);
    }
}
