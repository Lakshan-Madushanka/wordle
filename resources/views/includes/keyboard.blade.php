<div class="flex flex-col items-center bottom-12 space-y-3 !mt-8">
    <div class="flex items-center space-x-2">
        <x-key value="q" :keyStatusses="$keyStatusses"/>
        <x-key value="w" :keyStatusses="$keyStatusses"/>
        <x-key value="e" :keyStatusses="$keyStatusses"/>
        <x-key value="r" :keyStatusses="$keyStatusses"/>
        <x-key value="t" :keyStatusses="$keyStatusses"/>
        <x-key value="y" :keyStatusses="$keyStatusses"/>
        <x-key value="u" :keyStatusses="$keyStatusses"/>
        <x-key value="i" :keyStatusses="$keyStatusses"/>
        <x-key value="o" :keyStatusses="$keyStatusses"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
    </div>

    <div class="flex items-center space-x-2">
        <x-key value="a" :keyStatusses="$keyStatusses"/>
        <x-key value="s" :keyStatusses="$keyStatusses"/>
        <x-key value="d" :keyStatusses="$keyStatusses"/>
        <x-key value="f" :keyStatusses="$keyStatusses"/>
        <x-key value="g" :keyStatusses="$keyStatusses"/>
        <x-key value="h" :keyStatusses="$keyStatusses"/>
        <x-key value="j" :keyStatusses="$keyStatusses"/>
        <x-key value="k" :keyStatusses="$keyStatusses"/>
        <x-key value="l" :keyStatusses="$keyStatusses"/>
    </div>

    <div class="flex items-center space-x-2">
        <x-key class="py-4 px-8 sm:px-0 sm:py-0 w-14 sm:w-28" value="Enter"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
        <x-key value="p" :keyStatusses="$keyStatusses"/>
        <x-key class="py-4 sm:py-0 w-14 sm:w-28" value="Backspace">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
            </svg>
        </x-key>
    </div>
</div>
