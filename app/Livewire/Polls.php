<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{

    public function vote(Option $option)
    {
        return $option->votes()->create();
    }
    // protected $listeners = ["pollCreated" => "render"];
    #[On("pollCreated")]
    public function render()
    {
        $polls = Poll::with("options.votes")->latest()->get();
        return view('livewire.polls', ["polls" => $polls]);
    }
}
