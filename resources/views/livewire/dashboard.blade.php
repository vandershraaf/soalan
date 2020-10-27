<div>
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-4 mb-xl-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img class="mb-2" src="placeholder/icons/folder-o.svg" alt="" height="30" width="30">
                            <h5># of Topic</h5>
                        </div>
                        <span class="text-primary display-4 d-flex align-items-center ml-auto">{{ sizeof($topics) }}</span>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4 mb-xl-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img class="mb-2" src="placeholder/icons/users.svg" alt="" height="30" width="30">
                            <h5># of Quiz</h5>
                        </div>
                        <span class="text-danger display-4 d-flex align-items-center ml-auto">{{ $quizzesNum }}</span>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4 mb-xl-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img class="mb-2" src="placeholder/icons/calendar-o.svg" alt="" height="30" width="30">
                            <h5>Average Score</h5>
                        </div>
                        <span class="text-success display-4 d-flex align-items-center ml-auto">{{ number_format($averageScore,2) }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mx-auto" style="width: 200px;">
        <a class="btn btn-lg btn-primary" href="{{ url("/topic/add") }}">Create Topic</a>
    </div>

    <section class="py-4">
        <div class="container">
            <h2 class="mb-4">Topics</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr><th scope="col">#</th><th scope="col">Topic</th><th scope="col">Creation Date</th><th scope="col"></th><th scope="col"></th><th scope="col"></th></tr>
                    </thead>
                    <tbody>
                    @php
                        $index = 0;
                    @endphp
                    @foreach($topics as $topic)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $topic -> name }}</td>
                            <td>{{ $topic -> created_at }}</td>
                            <td><a class="btn btn-primary" href="{{ url("/quiz/".$topic -> id) }}">Start Quiz</a></td>
                            <td class="text-center"><a class="btn btn-secondary" href="{{ url("/topic/edit/".$topic -> id) }}">Edit</a></td>
                            <td class="text-center"><a class="btn btn-danger">Delete</a></td>
                        </tr>
                        @php
                            $index++;
                        @endphp
                    @endforeach

                    </tbody></table>
            </div>
        </div>
    </section>

</div>
