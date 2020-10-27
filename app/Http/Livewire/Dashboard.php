<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $topics;

    public function mount(){
        $this -> topics = Topic::where('user_id', Auth::user() -> id) -> get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
