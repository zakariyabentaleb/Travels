<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       
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
    public function store(Request $request)
    {
       
         Answer::create([
           
            'contenu' => $request->contenu,
            'utilisateur_id' => auth()->guard()->user()->id
        ]);
        return redirect()->route('questions.index')
        ->withSuccess('La question a été ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)

    {
         
          $question = Questions::find($id);
        return  view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $question)
    {
        return view('questions.edit', compact('question'));
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
