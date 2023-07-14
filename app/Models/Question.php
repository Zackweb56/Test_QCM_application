<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_name',
        'category_id',
    ];

    public function category(){
        return $this->hasMany(Category::class);
    }
    public function options(){
        return $this->belongsTo(Option::class);
    }
}
