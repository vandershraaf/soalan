<?php

namespace App\Http\Livewire;

use App\Models\Choice;
use App\Models\Pair;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Term;
use App\Models\Topic;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class QuizPage extends Component
{

    public $totalQuestions = 10;


    public $currentQuestionIndex;

    public $term1s;
    public $term2s;
    public $term1sCopy;
    public $term2sCopy;

    public $quizId;
    public $currentQuestionId;
    public $currentQuestionText;
    public $currentChoices;
    public $selectedChoiceId;
    public $scores;

    public $questionsAnswers; // [question id => [ question, selected, answer, correct or not ]]


    public function generateQuestion(){
        $questionList = null;
        $answerList = null;
        $whichList = rand(1,2);
        if ($whichList == 1){
            $currQ = array_pop($this -> term1s);
            // Use the list copy
            $answerList = collect($this -> term2sCopy) -> toArray();
        } else {
            $currQ = array_pop($this -> term2s);
            // Use the list copy
            $answerList = collect($this -> term1sCopy) -> toArray();
        }

        $currQPair = Pair::where('term_1_id', $currQ['id']) -> orWhere('term_2_id', $currQ['id']) -> first();

        if ($whichList == 1){
            $answerCurrQ = $currQPair -> term2();
        } else {
            $answerCurrQ = $currQPair -> term1();
        }
        // remove actual answer from answerlist, so we can get other answer choices there
        $toRemove = 0;
        for($i = 0; $i < sizeof($answerList); $i++){
            if ($answerList[$i]['id'] == $answerCurrQ -> id){
                $toRemove = $i;
            }
        }
        unset($answerList[$toRemove]);
        // shuffle again for fun
        shuffle($answerList);

        $question = Question::create([
            'quiz_id' => $this -> quizId,
            'term_id' => $currQ['id'],
            'selected_choice_id' => 0,
            'correct_answer_choice_id' => 0,
            'is_correct' => false,
        ]);
        $this -> currentQuestionId = $question -> id;
        $this -> currentQuestionText = $currQ['text'];

        $choices = collect();
        $whereToAnswer = rand(0,3);

        for ($j = 0; $j < 4; $j++){
            $currChoice = null;
            if ($j == $whereToAnswer){
                $currChoice = $answerCurrQ;
            } else {
                $currChoice = array_pop($answerList);
            }
            $choice = Choice::create([
                'question_id' => $question -> id,
                'term_id' => $currChoice['id']
            ]);
            $choices[$j] = $choice;
            if ($j == $whereToAnswer){
                $question = Question::find($this -> currentQuestionId);
                $question -> correct_answer_choice_id = $choice -> id;
                $question -> save();
            }
        }

        $this -> currentChoices = $choices;

    }



    public function mount($topicId){

        $this -> questionsAnswers = collect();
        $this -> currentQuestionIndex = 0;

        $topic = Topic::find($topicId);
        if (!isset($topic)){
            return redirect() -> to("/dashboard");
        }
        $pairs = Pair::where('topic_id', $topic -> id) -> get();

        // TODO : Minimum number of pairs in topic is 4. Need to enforce during topic creation

        if (sizeof($pairs) < $this->totalQuestions){
            $this -> totalQuestions = sizeof($pairs);
        }

        $this -> term1s = [];
        $this -> term2s = [];
        foreach ($pairs as $pair){
            $term1 = $pair -> term1();
            $term2 = $pair -> term2();
            array_push($this -> term1s, $term1);
            array_push($this -> term2s, $term2);
        }
        shuffle($this -> term1s);
        shuffle($this -> term2s);
        // We need to copy these 2 list fo the answer list, since it should not be shrinked in every loop
        $this -> term1sCopy = collect($this -> term1s) -> toArray();
        $this -> term2sCopy = collect( $this -> term2s) -> toArray();

        $quiz = Quiz::create([
            'topic_id' => $topic -> id
        ]);

        $this -> quizId = $quiz -> id;

        // Generate first question
        $this -> generateQuestion();

        $this -> selectedChoiceId = 0;

    }

    public function next(){
        // Set selected choice
        $question = Question::find($this -> currentQuestionId);
        $question -> selected_choice_id = $this -> selectedChoiceId;
        if ($this -> selectedChoiceId == $question -> correct_answer_choice_id){
            $this -> scores = $this -> scores + 1;
            $question -> is_correct = true;
        }
        $question -> save();
        $this -> currentQuestionIndex = $this -> currentQuestionIndex + 1;

        if ($this -> currentQuestionIndex < $this -> totalQuestions){
            // New question
            $this -> generateQuestion();
        } else {
            $quiz = Quiz::find($this -> quizId);
            $questions = $quiz -> questions();
            foreach ($questions as $question){
                $term = Term::find($question -> term_id);
                $qText = $term -> text;
                $selectedChoice = Choice::find($question -> selected_choice_id);
                $answerChoice = Choice::find($question -> correct_answer_choice_id);
                $this -> questionsAnswers -> put($question -> id, [
                    $qText,
                    $selectedChoice -> term -> text,
                    $answerChoice -> term -> text,
                    $question -> is_correct
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.quiz-page');
    }
}
