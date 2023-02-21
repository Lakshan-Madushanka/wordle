<?php

namespace App\Http\Livewire;

use App\Enums\GameStatus;
use App\Enums\LetterStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Game extends Component
{
    public array $guesses = [];
    public string $word = 'world';
    public string $gameStatus;

    protected $listeners = ['submitGuess'];

    public function mount()
    {
        $this->gameStatus = GameStatus::ACTIVE->value;
    }

    public function submitGuess(array $guess): void
    {
        $word = str_split($this->word);

        $this->guesses[] = collect($guess)->map(function ($letter, $index) use (&$word) {
            // Check letter contains in the correct position of the word
            if ($letter === $word[$index]) {
                return [
                    'letter' => $letter,
                    'status' => LetterStatus::CORRECT->value,
                ];
            }

            // Check letter contains in word (incorrect position)
            if (in_array($letter, $word, true)) {
                return [
                    'letter' => $letter,
                    'status' => LetterStatus::PRESENT->value,
                ];
            }

            return [
                'letter' => $letter,
                'status' => LetterStatus::ABSENCE->value,
            ];
        })->all();

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.game');
    }
}
