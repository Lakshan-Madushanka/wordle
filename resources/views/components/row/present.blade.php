<div
    x-data="currentGuess"
    x-on:keyup.stop.window="inputKey($event.key)"
    class="flex space-x-4"
>
    <div x-text="guess[0]" class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl"></div>
    <div x-text="guess[1]" class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl"></div>
    <div x-text="guess[2]" class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl"></div>
    <div x-text="guess[3]" class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl"></div>
    <div x-text="guess[4]" class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl"></div>
</div>
