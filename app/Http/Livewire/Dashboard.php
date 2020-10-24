<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class Dashboard extends Component
{
    public $topics;

    public function mount(){
        // for now, just get all topics in dashboard
        $this -> topics = Topic::all();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
