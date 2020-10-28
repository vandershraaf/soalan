<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use App\Models\Score;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $topics;
    public $quizzesNum;
    public $averageScore;

    public function mount(){
        $this -> topics = Topic::where('user_id', Auth::user() -> id) -> get();
        $this -> quizzesNum = Score::where('user_id', Auth::user() -> id) -> count();
        $totalScores = Score::where('user_id', Auth::user() -> id) -> sum('score_total');
        $totalQuestions = Score::where('user_id', Auth::user() -> id) -> sum('questions_total');
        if ($totalQuestions > 0){
            $this -> averageScore = (($totalScores * 1.0) / ($totalQuestions * 1.0)) * 100.0;
        } else {
            $this -> averageScore = 0.0;
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
