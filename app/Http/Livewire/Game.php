<?php

namespace App\Http\Livewire;

use App\Enums\GameStatus;
use App\Enums\LetterStatus;
use App\Support\WordGenerators\WordGenerator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Game extends Component
{
    public array $guesses = [];
    public string $word;
    public string $status;
    public array $keyStatuses = [];

    protected $listeners = ['submitGuess'];

    public function mount()
    {
        $this->status = GameStatus::ACTIVE;

        /** @var WordGenerator $wodGenerator */
        $wodGenerator = App::make(WordGenerator::class) ;
        $this->word = $wodGenerator->generate(5);
    }

    public function submitGuess(array $guess): void
    {

        if (count($this->guesses) === 6 | $this->status !== GameStatus::ACTIVE) {
            return;
        }

        $word = str_split($this->word);

        if ($guess === $word) {
            $this->dispatchBrowserEvent('played', ['status' => 'won', 'guessRow' => count($this->guesses)]);

            $this->status = GameStatus::WON;
        }


        $this->guesses[] = collect($guess)->map(function ($letter, $index) use (&$word) {
            // Check letter contains in the correct position of the word
            if ($letter === $word[$index]) {
                $this->keyStatuses[$letter] = LetterStatus::CORRECT;
                return [
                    'letter' => $letter,
                    'status' => LetterStatus::CORRECT,
                ];
            }

            // Check letter contains in word (incorrect position)
            if (in_array($letter, $word, true)) {
                $this->keyStatuses[$letter] = LetterStatus::PRESENT;
                return [
                    'letter' => $letter,
                    'status' => LetterStatus::PRESENT,
                ];
            }

            $this->keyStatuses[$letter] = LetterStatus::ABSENCE;
            return [
                'letter' => $letter,
                'status' => LetterStatus::ABSENCE,
            ];
        })->all();

        if (count($this->guesses) === 6 && $this->status !== GameStatus::WON) {
            $this->dispatchBrowserEvent('played', ['status' => 'lost']);

            $this->status = GameStatus::LOST;
        }

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.game');
    }
}
