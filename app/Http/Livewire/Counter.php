<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count;
    public $mytext = "";
    public $mylist;
    public $hidden;

    public function mount(){
        $this -> count = 0;
        $this -> mylist = [];
        $this -> hidden = false;
    }

    public function render(){
        return view('livewire.counter');
    }

    public function add(){
        array_push($this -> mylist, $this -> mytext);
    }

    public function remove($id){
        unset($this -> mylist[$id]);
    }

    public function increment(){
        $this->count++;
    }


}
