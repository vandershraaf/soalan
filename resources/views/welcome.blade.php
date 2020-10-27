@extends('layouts.app')


@section('content')

    <section class="py-5"><div class="container">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <h1 class="display-4">Quiz made easier</h1>
                    <p class="lead text-muted mb-4">You finished reading for your exam but still not sure if you have memorized everything? This tool can help you!</p>
                    <a class="btn btn-primary" href="#">Sign up</a><a class="btn btn-link" href="#">Login</a>
                </div>
                <div class="col-md-6"><img class="img-fluid mt-4 mt-md-0" src="images/photo-1516979187457-637abb4f9353.jpg" alt=""></div>
            </div>
        </div>
    </section>

    <section class="py-5"><div class="container">
            <h2 class="mb-3 text-center">How to Quiz?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="h-100 py-3 border-0">
                        <h2 class="position-absolute display-1 ml-5 pl-5 text-muted font-weight-bold" style="z-index: 1">1</h2>
                        <div class="mt-5 px-3" style="z-index: 2"><img class="mx-auto my-4" src="https://bootstrapshuffle.com/placeholder/pictures/image.svg?primary=fd7e14" alt="" width="40" height="40"><h4 class="mb-4">Create Topic with Pairs</h4>
                            <p>For example, topic "Capital Cities". Then, enter pairs for the topic: </p>
                            <p>"Malaysia - Kuala Lumpur"</p>
                            <p>"India - New Delhi" </p>
                            <p>"Laos - Vientiane" </p>
                            <p>"Kenya - Nairobi"</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 py-3 border-0">
                        <h2 class="position-absolute display-1 ml-5 pl-5 text-muted font-weight-bold" style="z-index: 1">2</h2>
                        <div class="mt-5 px-3" style="z-index: 2"><img class="mx-auto my-4" src="https://bootstrapshuffle.com/placeholder/pictures/image.svg?primary=fd7e14" alt="" width="40" height="40"><h4 class="mb-4">Start Quiz from Topic</h4>
                            <p>Select topic and start quiz from the topic. The answer choices will be taken from the pairs. Sample question:</p>
                            <p>
                                Kuala Lumpur</p>
                            <p>A) India </p>
                            <p>B) Malaysia </p>
                            <p>C) Kenya </p>
                            <p>D) Laos </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 py-3 border-0">
                        <h2 class="position-absolute display-1 ml-5 pl-5 text-muted font-weight-bold" style="z-index: 1">3</h2>
                        <div class="mt-5 px-3" style="z-index: 2"><img class="mx-auto my-4" src="https://bootstrapshuffle.com/placeholder/pictures/image.svg?primary=fd7e14" alt="" width="40" height="40"><h4 class="mb-4">Get Your Score</h4>
                            <p>Get your score to determine your familiarity with the topic.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center"><a class="btn btn-primary" href="#">Register now!</a></div>
        </div>
    </section>


@endsection
