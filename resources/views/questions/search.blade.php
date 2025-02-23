
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
    <!-- En-tête avec statistiques -->

    <!-- Barre de recherche et filtres -->
   

    <!-- Localisation actuelle -->
   

    <!-- Bouton pour poser une question -->
   

    <!-- Liste des questions -->
    <div class="grid grid-cols-1 gap-6 mb-8">
        @foreach ($search as $res)
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="p-5">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h2 class="text-xl font-semibold mb-1 text-gray-800">
                            
                                {{ $res->titre }} <!-- Titre de la question -->
                            
                        </h2>
                        
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="flex items-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $res->emplacement }} <!-- Emplacement de la question -->
                            </span>
                           
                           
                        </div>
                    </div>
                   
                </div>
                <p class="text-gray-600 mb-4">{{ $res->contenu }}</p> <!-- Description de la question -->
                <div class="flex justify-between items-center">
                   
                    
                </div>
            </div>
        </div>
       
        @endforeach
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
