<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favories extends Model
{
      use HasFactory;
     
      protected $fillable = [
          'utilisateur_id', 
          'question_id', 
      ];

      public function questions(){
          
        return $this->hasMany(Questions::class);

      }
      
}
