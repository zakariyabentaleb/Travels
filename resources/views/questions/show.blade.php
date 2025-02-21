<x-app-layout>
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $question->titre }}</h1>
        <p class="text-gray-700 mb-4">{{ $question->contenu }}</p>
       
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold">Réponses</h2>
@foreach($question->answers as $answer)
<p>{{$answer->id}}</p>
<p>{{$answer->contenu}}</p>
<p>{{$answer->created_at}}</p>
@endforeach  
    </div>

    @auth
    <div class="mt-6">
        <h3 class="text-lg font-semibold mb-2">Ajouter une réponse</h3>
        <form action="{{route('questions.reponsestore', $question->id)}}" method="POST" class="space-y-4">
            @csrf
            <textarea name="content" class="w-full p-3 border border-gray-300 rounded-lg" rows="4" placeholder="Votre réponse..." required></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Répondre</button>
        </form>
    </div>
    @endauth
</div>
</x-app-layout>
