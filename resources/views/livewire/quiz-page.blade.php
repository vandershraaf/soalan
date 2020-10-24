<div>


    @if ($currentQuestionIndex < $totalQuestions)
        <h3>Question {{ $currentQuestionIndex + 1 }}</h3>

        <p>{{ $currentQuestionText }}</p>
        <ul style="text-decoration: none">

            @for($j = 0; $j < sizeof($currentChoices); $j++)
                <li><input type="radio"
                           name="mychoice"
                           wire:model.defer="selectedChoiceId"
                           value="{{ ($currentChoices[$j]) -> id }}">
                    @php
                        $term = ($currentChoices[$j]) -> term;
                    @endphp
                    {{ $term -> text }}
                </li>
            @endfor
        </ul>

        <p><button wire:click="next()">Next</button></p>

    @else

        <h2>Score : {{ $scores }} / {{ $totalQuestions }}</h2>



        <ul style="text-decoration: none">
        @foreach($questionsAnswers as $questionId => $arr)
            <p>------</p>
            <p>Question : {{ $arr[0] }}</p>
            <p>Selected : {{ $arr[1] }}</p>
            <p>Answer : {{ $arr[2] }}</p>
            <p>Correct : {{ $arr[3] == true? 'yes' : 'no' }}</p>
            <p>------</p>
            @endforeach
        <ul>

    @endif


</div>
