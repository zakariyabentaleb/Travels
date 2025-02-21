<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-lg p-6 mb-8 text-white">
        <h1 class="text-3xl font-bold">Poser une Question</h1>
        <p class="text-lg">Partagez votre question avec votre voisinage</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="titre" class="block text-gray-700 font-semibold">Titre de la question</label>
                <input type="text" id="titre" name="titre" required
                    class="w-full mt-2 px-4 py-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            </div>
    
            <div class="mb-4">
                <label for="contenu" class="block text-gray-700 font-semibold">Description</label>
                <textarea id="contenu" name="contenu" rows="4" required
                    class="w-full mt-2 px-4 py-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200"></textarea>
            </div>
    
            <div class="mb-4">
                <label for="emplacement" class="block text-gray-700 font-semibold">Localisation</label>
                <input type="text" id="emplacement" name="emplacement" required
                    class="w-full mt-2 px-4 py-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            </div>
    
            <div class="flex justify-end mt-6">
                <a href="{{ route('questions.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-3 px-6 rounded-lg mr-4">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg">
                    Publier la question
                </button>
            </div>
        </form>
    </div>
    
</div>
</x-app-layout>

