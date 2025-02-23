<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Favories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavoriesController extends Controller
{
   
    
        public function index()
        {
            $user = Auth::user();
    
           
            $questions = DB::table('favories')
                ->join('questions', 'favories.question_id', '=', 'questions.id')
                ->select('questions.titre')
                ->where('favories.utilisateur_id', '=', $user->id)
                ->get();
          
          
            return view('favories.index', [
                'questions' => $questions
            ]);
        }
   

   
    public function create()
    {
       
    }

    
    public function store(Questions $question)
    {
     
        // dd($question->id);
        // dd(request()->all());
        $user = Auth::user();
       
        Favories::create([
            'utilisateur_id' => $user->id,
            'question_id' => $question->id
        ]);
    }

    
    public function show()

    {
            return view('favories.show');   
    }

   
    public function edit(Questions $question)
    {
      
    }
    
  

    
    public function destroy(Questions $questions)
    {
        $questions->delete();

        return redirect()->route('questions.index')
                ->withSuccess('La question a été supprimée avec succès.');
    }
}
