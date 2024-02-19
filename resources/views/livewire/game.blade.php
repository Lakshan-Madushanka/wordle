@php
    use App\Enums\GameStatus;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Str;
@endphp

<div
    x-data="{stats: $persist({played: 0, won: 0, guesses: [0, 0, 0, 0, 0, 0]})}"
    @played.stop.window="
                stats.played = stats.played + 1;
                if ($event.detail.status === 'won') {
                   stats.won ++;
                   stats.guesses[$event.detail.guessRow] = stats.guesses[$event.detail.guessRow] + 1;
                }
           "
>
    <header class="flex justify-between items-center p-4 border-b-2 border-gray-300">
        <div class="dark:text-white">
            <svg x-data @click="$dispatch('display-help')" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"/>
            </svg>
        </div>

        <div class="text-4xl font-bold">
            <h1 class="dark:text-white">WORDLE</h1>
        </div>

        <div class="flex space-x-2 dark:text-white">
            <svg x-data @click="$dispatch('display-stats')" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
            </svg>
            <svg x-data @click="$dispatch('display-settings')" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
    </header>

    <div class="flex flex-col space-y-4 justify-center items-center relative" wire:loading.class="opacity-40">
        <div @class([
                 "absolute",
                 "border-4",
                 "border-white",
                 "border-dotted",
                 "rounded",
                 "flex",
                 "justify-center",
                 "items-center",
                 "top-[2rem]",
                 "mt-4",
                 "py-8",
                 "px-8",
                 "bg-[red]" => $status === GameStatus::LOST,
                 "bg-purple-600" => $status === GameStatus::WON,
                 "text-white",
                 "h-12",
                 "align-middle",
                 "shadow-2xl",
                 "shadow-[0_20px_50px_rgba(8,_112,_184,_0.7)]",
                 "invisible" => $status === GameStatus::ACTIVE,
           ])>
            <span class="mr-2 text-xl">
                @if($status === GameStatus::LOST)
                    <span class="text-2xl"> 😭 </span> Lost word is <span class="font-bold uppercase">{{$word}}</span>
                @elseif($status === GameStatus::WON)
                    <span class="text-2xl">🏆</span> Won
                @endif
            </span>
            <a href="#" class="font-medium underline hover:no-underline cursor-pointer" wire:click="replay">replay</a>
        </div>

        @foreach($guesses as $guess)
            <x-row.past :guess="$guess" wire:key="{{Str::random()}}"/>
        @endforeach

        @if(count($guesses) < 6)
            @if($status === GameStatus::ACTIVE)
                <x-row.present/>
            @else
                <x-row.future/>
            @endif
        @endif

        @for($i = count($guesses); $i < 5; $i++)
            <x-row.future wire:key="{{Str::random()}}"/>
        @endfor

        @include('includes.keyboard', ['keyStatuses' => $keyStatuses])
    </div>

    <div class="absolute top-[16rem] flex w-full justify-center items-center" wire:loading.flex>
        <x-spinner class="w-24 h-24" wire:loading.delay/>
    </div>

    @include('includes.help')
    @include('includes.settings')
    @include('includes.stats')
{{--    @includeUnless(App::isProduction(), 'includes.testing')--}}
</div>

