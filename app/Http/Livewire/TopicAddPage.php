<?php

namespace App\Http\Livewire;

use App\Models\Term;
use App\Models\Topic;
use Livewire\Component;

class TopicAddPage extends Component
{

    public $name;
    public $index;
    public $tempPairs;

    public function mount(){
        $this -> name = null;
        $this -> tempPairs = collect();
        $this -> index = 0;
    }

    public function add(){
        $this -> tempPairs -> put($this -> index,['','']);
        $this -> index = $this -> index + 1;
    }

    public function remove($key){
        $this -> tempPairs -> forget($key);
    }

    public function submit(){
        $topic = new Topic();
        $topic -> name = $this -> name;
        // TODO : If user is logged in, set the actual user id
        $topic -> user_id = 0;
        // TODO : How to determine visibility?
        $topic -> is_public = true;
        $topic -> save();
        foreach ($this -> tempPairs as $key => $arr){
            $term1 = Term::create([
               'text' => $arr[0]
            ]);
            $term2 = Term::create([
                'text' => $arr[1]
            ]);
            $topic -> pairs() -> create([
                'term_1_id' => $term1 -> id,
                'term_2_id' => $term2 -> id
            ]);
        }
        return redirect() -> to('/dashboard');
    }

    public function render()
    {
        return view('livewire.topic-add-page');
    }
}
