<x-modal @display-help.window.stop="modelOpen = true">
    <div>
        <div>
            <h1 class="text-2xl font-extrabold">How To Play</h1>
            <p class="text-xl mt-2">Guess the Word in 6 tries.</p>
        </div>
        <ol class="list-disc mt-4 pl-4">
            <li>Each guess must be a valid 5-letter word.</li>
            <li>The color of the tiles will change to show how close your guess was to the word.</li>
        </ol>

        <div class="mt-4">
            <p class="font-bold mb-2">Examples</p>
            <div class="space-y-6">
                <div>
                    <div class="flex items-center space-x-1 mb-1">
                        <x-key value="W" :keyStatuses="['W' => \App\Enums\LetterStatus::CORRECT ]"/>
                        <x-key value="E"/>
                        <x-key value="A"/>
                        <x-key value="K"/>
                        <x-key value="Y"/>
                    </div>
                    <p class="mt-2"><strong>W</strong> is in the word and in the correct spot.</p>
                </div>
                <div>
                    <div class="flex items-center space-x-1 my-2">
                        <x-key value="P"/>
                        <x-key value="I" :keyStatuses="['I' => \App\Enums\LetterStatus::PRESENT ]"/>
                        <x-key value="L"/>
                        <x-key value="L"/>
                        <x-key value="S"/>
                    </div>
                    <p class="mt-2"><strong>I</strong> is in the word but in the wrong spot.</p>
                </div>
                <div>
                    <div class="flex items-center space-x-1 my-2">
                        <x-key value="V"/>
                        <x-key value="A"/>
                        <x-key value="G"/>
                        <x-key value="U" :keyStatuses="['U' => \App\Enums\LetterStatus::ABSENCE ]"/>
                        <x-key value="E"/>
                    </div>
                    <p class="mt-2"><strong>U</strong> is not in the word in any spot.</p>
                </div>
            </div>
        </div>

    </div>
</x-modal>
