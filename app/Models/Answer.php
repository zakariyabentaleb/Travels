<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $guarded = ['id'];

    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    // public function question()
    // {
    //     return $this->belongsTo(Questions::class, 'question_id');
    // }
}

