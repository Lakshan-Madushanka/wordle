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
     "bg-gray-200 w-6 h-6 sm:w-10 sm:h-10 rounded-md flex justify-center items-center uppercase hover:cursor-pointer"
     ])
     }}
    id="key-{{$value}}"
>
    @if($slot->isEmpty())
        {{$value}}
    @else
        {{$slot}}
    @endif
</div>
