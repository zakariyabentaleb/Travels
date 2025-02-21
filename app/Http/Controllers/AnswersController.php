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
    public function store(Questions $question)
    {
        // dd($question->id);
        // dd(request()->all());
        $rpnse = new Answer();
        $rpnse-> questions_id = $question->id;
        $rpnse->contenu = request()->get('content');
        $rpnse->utilisateur_id =Auth::id();
        $rpnse->save();
        return redirect()->route('questions.show',$question -> id );
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)

    {
         
         
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
    public function update(Request $request, Questions $question)
    {
       
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $questions)
    {
      
    }
}
