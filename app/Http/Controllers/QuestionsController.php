<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class QuestionsController extends Controller
{
    
    public function index()
    {
        
        return view('questions.index', [
            'questions' => Questions::latest()->paginate(5),
            'totalQuestions' => Questions::count()
        ]);
    }

   
    public function create()
    {
        return view('questions.create');
    }

   
    public function store(Request $request)
    {
       
         Questions::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'emplacement' => $request->emplacement,
            'date_publication' => now(),
            'utilisateur_id' => auth()->guard()->user()->id
        ]);
        return redirect()->route('questions.index')
        ->withSuccess('La question a été ajoutée avec succès.');
    }

    
    public function show( $id)

    {
         
          $question = Questions::find($id);
        return  view('questions.show', compact('question'));
    }

   
    public function edit(Questions $question)
    {
        return view('questions.edit', compact('question'));
    }
    
   
    public function update(Request $request, Questions $question)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);
    
        $question->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
        ]);
    
        return redirect()->route('questions.index')->with('success', 'Question mise à jour avec succès.');
    }

    public function search(Request $request){
       

        $searchTerm = $request->input('search');
        $results = DB::table('questions')
        ->where('titre', 'like', '%'.$searchTerm.'%')
        ->get();

     
       

          return view('questions.search',[
               'search'=>$results,
               'searchTerm'=>$searchTerm
          ]);
        
    }
    

    
    public function destroy(Questions $questions)
    {
        $questions->delete();

        return redirect()->route('questions.index')
                ->withSuccess('La question a été supprimée avec succès.');
    }
}
