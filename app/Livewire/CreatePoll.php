<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        "options" => "required|array|min:1|max:10",
        'options.*' => "required|min:1|max:255"
    ];
    protected $messages = [
        "options.*" => "the option can't be empty"
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addOption(): array
    {
        $this->options[] = "";
        return $this->options;
    }
    public function removeOption($index): array
    {
        unset($this->options[$index]);
        return $this->options = array_values($this->options);
    }
    public function save()
    {
        $this->validate();
        // $poll = 
        Poll::create(["title" => $this->title])
            ->options()->createMany(
                collect($this->options)
                    ->map(fn ($option) => ['name' => $option])
                    ->all()
            );

        // foreach ($this->options as $optionName) {
        //     $poll->options()->create(["name" => $optionName]);
        // };

        $this->reset(["title", "options"]);
        $this->dispatch("pollCreated");
    }

    public function render()
    {
        return view('livewire.create-poll');
    }
}
