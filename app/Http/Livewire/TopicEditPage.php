<?php

namespace App\Http\Livewire;

use App\Models\Pair;
use App\Models\Term;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Topic;

class TopicEditPage extends Component
{

    public $topicId;
    public $name;
    public $pairs; // Pair id => [term 1, term 2]
    public $tempPairs; // Random id => [term 1, term 2]

    public function loadPairs($topic){
        $pairs = Pair::where('topic_id', $topic -> id) -> get();
        foreach ($pairs as $pair){
            $term1 = $pair -> term1();
            $term2 = $pair -> term2();
            $this -> pairs -> put($pair -> id, [$term1 -> text, $term2 -> text]);
        }
    }

    public function mount($id = null){
        $this -> topicId = $id;
        $this -> pairs = collect();
        $this -> tempPairs = collect();
        if (isset($id)){
            $topic = Topic::find($id);
            $this -> name = $topic -> name;
            $this->loadPairs($topic);
            Log::debug($this -> pairs);
        } else {
           return redirect() -> to('/dashboard');
        }
    }


    public function add(){
        $this -> tempPairs -> put(time(),['','']);
    }

    public function removePair($key){
        $topic = Topic::find($this -> topicId);
        $toRemove = $topic -> pairs() -> find($key);
        $toRemove -> delete();
        $this -> loadPairs($topic);
        // Workaround to reload the latest pairs
        return redirect() -> to('/topic/edit/'.$this -> topicId);
    }

    public function removeTemp($key){
        $this -> tempPairs -> forget($key);
    }

    public function submit(){
        // Edit existing topic and pair
        $topic = Topic::find($this -> topicId);
        $topic -> name = $this -> name;
        $topic -> save();
        foreach ($this -> pairs as $id => $arr){
            $pair = Pair::find($id);
            $term1 = $pair -> term1();
            $term2 = $pair -> term2();

            $term1 -> text = $arr[0];
            $term1 -> save();
            $term2 -> text = $arr[1];
            $term2 -> save();
        }

        // Add new pairs
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
        return view('livewire.topic-edit-page');
    }
}
