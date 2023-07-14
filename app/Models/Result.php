<?php

namespace App\Models;

use App\Models\User;
use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'questions',
        'userAnswers',
        'correct_answers',
        'score',
        'status',
    ];

    // public function option(){
    //     return $this->belongsToMany(Option::class);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
