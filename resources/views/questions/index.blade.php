
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
    <!-- En-tête avec statistiques -->
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold">Questions Locales</h1>
                <p class="text-lg">Trouvez des réponses dans votre voisinage</p>
            </div>
            <div class="grid grid-cols-2 gap-4 text-center">
                <div class="bg-white/20 p-3 rounded-lg">
                    <span class="block text-2xl font-bold">{{ $totalQuestions }}</span>
                    <span class="text-sm">Questions posées</span>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <span class="block text-2xl font-bold">1024</span>
                    <span class="text-sm">Réponses publiées</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Barre de recherche et filtres -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-8">
        <form action="{{ route('questions.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" name="query" placeholder="Rechercher une question..." 
                        class="w-full pl-10 pr-4 py-3 rounded-lg border focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <div class="w-full md:w-1/4">
                <select name="sort" class="w-full py-3 px-4 rounded-lg border focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                    <option value="distance">Trier par distance</option>
                    <option value="recent">Plus récentes</option>
                    <option value="popular">Plus populaires</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all">
                Rechercher
            </button>
        </form>
    </div>

    <!-- Localisation actuelle -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-8 flex items-center justify-between">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span id="current-location">Paris, France</span>
        </div>
        <button onclick="getUserLocation()" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
            Mettre à jour ma position
        </button>
    </div>

    <!-- Bouton pour poser une question -->
    <div class="flex justify-center mb-8">
        <a href="/create" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold py-4 px-8 rounded-full shadow-lg transform hover:scale-105 transition-all flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Poser une question
        </a>
    </div>

    <!-- Liste des questions -->
    <div class="grid grid-cols-1 gap-6 mb-8">
        @foreach ($questions as $question)
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="p-5">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h2 class="text-xl font-semibold mb-1 text-gray-800">
                            <a href="{{ route('questions.show', $question->id) }}" class="hover:text-blue-600 transition-colors">
                                {{ $question->titre }} <!-- Titre de la question -->
                            </a>
                        </h2>
                        
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="flex items-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $question->emplacement }} <!-- Emplacement de la question -->
                            </span>
                            <span class="flex items-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $question->created_at->diffForHumans() }} <!-- Temps écoulé -->
                            </span>
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                {{ $question->responses_count }} réponses <!-- Nombre de réponses -->
                            </span>
                        </div>
                    </div>
                    <div>
                        {{-- @if(auth()->id() != $question->user_id) --}}
                   <a href="{{ route('questions.edit', $question->id) }}"> <button  class="p-2 bg-gray-100 rounded hover:bg-gray-200">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4h2m1 0h2m4 3a2.5 2.5 0 00-5 0m-5 4L4 19l-1 4 4-1 9-9m-1-3a2.5 2.5 0 115 0" />
                       </svg>
                         </button> </a>
                         <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-gray-100 rounded hover:bg-red-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-red-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6L18 18M6 18L18 6" />
                                </svg>
                            </button>
                        </form>
                        {{-- @endif --}}

                        <button class="favorite-btn text-gray-400 hover:text-yellow-500 transition-colors" 
                            data-question-id="{{ $question->id }}" 
                            data-is-favorite="{{ $question->is_favorite }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </button>
                        
                    </div>
                </div>
                <p class="text-gray-600 mb-4">{{ $question->contenu }}</p> <!-- Description de la question -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name={{ $question->author_name }}" class="h-8 w-8 rounded-full mr-2" alt="{{ $question->author_name }}">
                        <span class="text-sm text-gray-700">{{ $question->author_name }}</span> <!-- Auteur de la question -->
                    </div>
                    <div class="text-sm text-gray-600">
                        <span>{{ $question->distance }} km</span> <!-- Distance de l'auteur -->
                    </div>
                </div>
            </div>
        </div>
       
        @endforeach
    </div>
    
    <!-- Pagination -->
    <div class="mt-6">
        {{ $questions->links() }} <!-- Liens de pagination -->
    </div>
    

    <!-- Pagination -->
    <div class="py-4 flex justify-center">
        <nav>
            <ul class="flex">
                <li>
                    <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 rounded-l-md">Précédent</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 border border-gray-300 bg-blue-500 text-white hover:bg-blue-600">1</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">2</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">3</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 rounded-r-md">Suivant</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Questions populaires -->
    <div class="rounded-lg bg-gray-50 p-6 mb-8">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Questions populaires</h2>
        <div class="space-y-4">
            <div class="bg-white rounded-md p-4 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <a href="#" class="text-lg font-medium text-blue-600 hover:text-blue-800 transition-colors">
                    Meilleurs restaurants végétariens dans le Marais?
                </a>
                <div class="flex items-center mt-2 text-sm text-gray-500">
                    <span class="flex items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        24 réponses
                    </span>
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        18 favoris
                    </span>
                </div>
            </div>
            <div class="bg-white rounded-md p-4 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <a href="#" class="text-lg font-medium text-blue-600 hover:text-blue-800 transition-colors">
                    Recommandation pour une nounou dans le 15ème?
                </a>
                <div class="flex items-center mt-2 text-sm text-gray-500">
                    <span class="flex items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        19 réponses
                    </span>
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        15 favoris
                    </span>
                </div>
            </div>
            <div class="bg-white rounded-md p-4 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <a href="#" class="text-lg font-medium text-blue-600 hover:text-blue-800 transition-colors">
                    Parking sécurisé pour vélo à Bastille?
                </a>
                <div class="flex items-center mt-2 text-sm text-gray-500">
                    <span class="flex items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        16 réponses
                    </span>
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363" />
                        </svg>
                    </span>
</x-app-layout>
<div class="grid grid-cols-2 gap-4 text-center">
    <div class="bg-white/20 p-3 rounded-lg">
        <span id="questionCount" class="block text-2xl font-bold">0</span>
        <span class="text-sm">Questions posées</span>
    </div>
    <div class="bg-white/20 p-3 rounded-lg">
        <span id="answerCount" class="block text-2xl font-bold">0</span>
        <span class="text-sm">Réponses publiées</span>
    </div>
</div>

