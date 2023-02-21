<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Game extends Component
{
    public array $guesses = [];
    public string $word = 'world';

    protected $listeners = ['submitGuess'];

    public function submitGuess(array $guess): void
    {
        $word = str_split($this->word);

        $this->guesses[] = collect($guess)->map(function ($letter, $index) use(&$word) {
            // Check letter contains in the correct position of the word
            if ($letter === $word[$index]) {
                return [
                    'letter' => $letter,
                    'status' => 'correct',
                ];
            }

            // Check letter contains in word (incorrect position)
            if (in_array($letter, $word, true)) {
                return [
                    'letter' => $letter,
                    'status' => 'present',
                ];
            }

            return [
                'letter' => $letter,
                'status' => 'absent',
            ];
        })->all();

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.game');
    }
}
