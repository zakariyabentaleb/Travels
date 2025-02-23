<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Favories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
        public function index()
        {
            $user = Auth::user();
    
            // Récupérer les titres des questions favorisées de cet utilisateur
            $questions = DB::table('favories')
                ->join('questions', 'favories.question_id', '=', 'questions.id')
                ->select('questions.titre')
                ->where('favories.utilisateur_id', '=', $user->id)
                ->get();
          
            // Passer les questions récupérées à la vue
            return view('favories.index', [
                'questions' => $questions
            ]);
        }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show()

    {
            return view('favories.show');   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $question)
    {
      
    }
    
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Questions $questions)
    // {
    //     $questions->update($request->validated());

    //     return redirect()->back()
    //             ->withSuccess('La question a été mise à jour avec succès.');
    // }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $questions)
    {
        $questions->delete();

        return redirect()->route('questions.index')
                ->withSuccess('La question a été supprimée avec succès.');
    }
}
