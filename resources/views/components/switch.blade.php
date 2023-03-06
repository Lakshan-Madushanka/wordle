@props([
    'checkedStatus' => 'false',
    'switchToggleAction' => ''
    ])

<div
    class="flex items-center justify-center"
    x-data="{ checked: {{$checkedStatus}} }"
>
    <button
        type="button"
        role="switch"
        tabindex="0"
        :aria-checked="checked"
        :class="{ 'bg-teal-500': checked, 'bg-teal-900': ! checked }"
        class="relative inline-flex flex-shrink-0 h-[28px] w-[64px] border-2 border-transparent rounded-full cursor-pointer transition-colors
        ease-in-out duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
        @click="
        {{$switchToggleAction}}
        checked = ! checked;
        "
    >
        <span class="sr-only">
            Some label for screen readers only
        </span>

        <span
            aria-hidden="true"
            :class="{ 'translate-x-9': checked }"
            class="pointer-events-none inline-block h-[24px] w-[24px] rounded-full bg-white
            shadow-lg transform ring-0 transition ease-in-out duration-200"
        ></span>
    </button>
</div>
