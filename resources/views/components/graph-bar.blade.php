@props([
    'guessNo',
    'noOfGuesses',
    'percentage'
])

@php
    if ($percentage < 7) {
        $percentage = 7;
    }
@endphp
<div class="flex space-x-1">
    <div class="mr-1"> {{$guessNo}} </div>
    <div
        x-data="{percentage: 0}"
        @display-stats.window.stop="
        percentage = (stats.guesses[{{$guessNo - 1}}]/stats.won) * 100;
        if (isNaN(percentage) || percentage < 7) {
            percentage = 7;
        }
        "
        :style="`width: ${percentage}%`"
        class="px-1 bg-gray-500 text-white text-right"
        x-text="stats.guesses[{{$guessNo - 1}}]"
    >
    </div>

</div>
