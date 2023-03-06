<x-modal @display-stats.window.stop="modelOpen = true">
    <div>
        <h1 class="text-xl text-center w-full font-medium uppercase">Statistics</h1>
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
        <div class="mt-4 mr-4 ml-6 sm:mr-8 sm:ml-12 space-y-1">
            <x-graph-bar guessNo="1" noOfGuesses="0" percentage="1"/>
            <x-graph-bar guessNo="2" noOfGuesses="10" percentage="20"/>
            <x-graph-bar guessNo="3" noOfGuesses="20" percentage="30"/>
            <x-graph-bar guessNo="4" noOfGuesses="80" percentage="80"/>
            <x-graph-bar guessNo="5" noOfGuesses="100" percentage="100"/>
        </div>
    </div>
</x-modal>
