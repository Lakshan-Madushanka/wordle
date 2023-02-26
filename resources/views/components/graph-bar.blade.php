@props([
    'guessNo',
    'noOfGuesses',
    'percentage'
])

@php
    if ($percentage < 5) {
        $percentage = 5;
    }
@endphp
<div class="flex space-x-1">
    <div> {{$guessNo}} </div>
    <div
        x-text="stats.guesses[{{$guessNo - 1}}]"
        style="width:{{$percentage}}%"
        class="px-2 bg-gray-500 text-white text-right"
    >
    </div>
</div>
