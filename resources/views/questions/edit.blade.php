<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Modifier la Question</h2>
            
            <form action="{{ route('questions.update', $question->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 font-medium mb-2">Titre</label>
                    <input type="text" name="titre" id="titre" value="{{ old('titre', $question->titre) }}" 
                           class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('titre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="contenu" class="block text-gray-700 font-medium mb-2">Contenu</label>
                    <textarea name="contenu" id="contenu" rows="5"
                              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('contenu', $question->contenu) }}</textarea>
                    @error('contenu')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end gap-2">
                    <a href="{{ route('questions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Annuler</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
