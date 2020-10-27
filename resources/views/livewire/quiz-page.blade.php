<div>

    <div class="container mx-auto" style="width: 300px;">
        <h1 class="text-center">Quiz : {{ $topicName }}</h1>
    </div>

    @if ($currentQuestionIndex < $totalQuestions)

        <div class="container mx-auto" style="width: 500px;">
            <h3>Question #{{ $currentQuestionIndex + 1 }}</h3>
        </div>


        <div class="container mx-auto" style="width: 500px;">
            <div class="form-group">
                <label for="">{{ $currentQuestionText }}</label>


                @for($j = 0; $j < sizeof($currentChoices); $j++)
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="radio-name"
                               wire:model.defer="selectedChoiceId"
                               value="{{ ($currentChoices[$j]) -> id }}">
                        @php
                            $term = ($currentChoices[$j]) -> term;
                        @endphp
                        <label class="form-check-label" for="">{{ $term -> text }}</label>
                    </div>
                @endfor

                <div class="container mx-auto" style="width: 200px;">
                    <a class="btn btn-lg btn-primary" wire:click="next()">Next</a>
                </div>

            </div>
        </div>

    @else

        <div class="mx-auto" style="width: 500px;">
            <h3 class="text-center">Final Scores</h3>
        </div>

        <div class="mx-auto" style="width: 300px;">
            <div class="card text-white text-center bg-primary" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-title">Score</p>
                    <h3 class="card-text">{{ $scores }} / {{ $totalQuestions }}</h3>
                </div>
            </div>

        </div>

        <div class="container mt-3">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Selected Answer</th>
                    <th scope="col">Actual Answer</th>
                    <th scope="col">Correct?</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $index = 0;
                @endphp
                @foreach($questionsAnswers as $questionId => $arr)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $arr[0] }}</td>
                        <td>{{ $arr[1] }}</td>
                        <td>{{ $arr[2] }}</td>
                        <td>
                            @if($arr[3] == true)
                                <i class="far fa-check-circle bg-primary"></i>
                            @else
                                <i class="far fa-times-circle bg-danger"></i>
                            @endif
                        </td>
                    </tr>
                    @php
                        $index++;
                    @endphp
                @endforeach
                </tbody>
            </table>
        </div>


    @endif


</div>
