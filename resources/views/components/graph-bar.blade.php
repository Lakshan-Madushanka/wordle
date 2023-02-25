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
    <div style="width:{{$percentage}}%"
         class="px-2 bg-gray-500 text-white text-right"
    >
        {{$noOfGuesses}}
    </div>
</div>
