<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Post extends Component
{
    #[On('ShowPost')]
    public function ShowPost()
    {

        // $this->dispatch('post-show');
        return redirect()->route('Showpost');
    }

    public function render()
    {
        return view('livewire.post');
    }
}
