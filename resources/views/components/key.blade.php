@props([
        'value' => "",
         'keyStatuses' => [],
    ])

<div
    x-data
    @click="$dispatch('key-clicked', '{{$value}}')"
    {{
        $attributes->class([
            $keyStatuses[$value] ?? "",
     "bg-gray-200 w-8 h-8 sm:w-12 sm:h-12 rounded-md flex justify-center items-center uppercase hover:cursor-pointer"
     ])
     }}
>
    @if($slot->isEmpty())
        {{$value}}
    @else
        {{$slot}}
    @endif
</div>
