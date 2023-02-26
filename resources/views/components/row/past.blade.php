@props(['guess'])

<div class="flex space-x-4">
    <div
        class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl {{$guess[0]['status']}}">
        {{$guess[0]['letter']}}
    </div>
    <div
        class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl {{$guess[1]['status']}}">
        {{$guess[1]['letter']}}
    </div>
    <div
        class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl {{$guess[2]['status']}}">
        {{$guess[2]['letter']}}
    </div>
    <div
        class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl {{$guess[3]['status']}}">
        {{$guess[3]['letter']}}
    </div>
    <div
        class="flex justify-center items-center w-12 h-12 border border-gray-300 uppercase font-bold text-4xl {{$guess[4]['status']}}">
        {{$guess[4]['letter']}}
    </div>
</div>
