<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="mt-6">
            <h2 class="text-2xl font-semibold text-gray-800">Réponses</h2>
            <div class="space-y-4 mt-4">
                
                @foreach($questions as $question)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <h1 class="text-2xl font-bold mb-4">{{ $question->titre }}</h1>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
