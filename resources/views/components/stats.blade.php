<div x-data="{ modelOpen: false }" @display-stats.window="modelOpen = true" >
    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
            >
                <div class="flex items-center justify-end space-x-4">
                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Content -->
                <div>
                    <h1 class="text-xl text-center w-full font-medium text-gray-800 uppercase">Statistics</h1>

                    <div class="flex space-x-4 mt-2 mb-4 justify-center">
                        <div class="flex flex-col justify-center items-center">
                            <p class="text-4xl" x-text="stats.played"></p>
                            <p class="text-[10px]">Played</p>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <p
                                x-text="
                                    percentage =  Math.ceil((stats.won/stats.played) * 100);
                                    if (isNaN(percentage)) {
                                        return 0;
                                    }
                                    return percentage;
                                    "
                                class="text-4xl"
                            >
                            </p>
                            <p class="text-[10px]">Win %</p>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <p class="text-4xl" x-text="stats.won"></p>
                            <p class="text-[10px]">Won</p>
                        </div>
                    </div>

                    <p class="text-center uppercase font-medium">Guess distribution</p>

                    <div class="mt-4 mr-8 ml-12 space-y-1">
                       <x-graph-bar guessNo="1" noOfGuesses="0" percentage="1"/>
                       <x-graph-bar guessNo="2" noOfGuesses="10" percentage="20"/>
                       <x-graph-bar guessNo="3" noOfGuesses="20" percentage="30"/>
                       <x-graph-bar guessNo="4" noOfGuesses="80" percentage="80"/>
                       <x-graph-bar guessNo="5" noOfGuesses="100" percentage="100"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
