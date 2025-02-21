<x-app-layout>
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $question->titre }}</h1>
        <p class="text-gray-700 mb-4">{{ $question->contenu }}</p>
       
    </div>

    <div class="mt-6">
        <h2 class="text-2xl font-semibold text-gray-800">Réponses</h2>
        <div class="space-y-4 mt-4">
            @foreach($question->answers as $answer)
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                    <p class="text-gray-900 font-medium">{{ $answer->user->name ?? 'Utilisateur Anonyme' }}</p>
                    <p class="text-gray-700 mt-2">{{ $answer->contenu }}</p>
                    <p class="text-sm text-gray-500 mt-2">Publié le : {{ $answer->created_at->format('d M Y, H:i') }}</p>
                </div>
            @endforeach
        </div>
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
