
<nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand d-lg-none" href="#">Quizzz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations-02"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse justify-content-md-center" id="navigations-02">
        <div class="row w-100">
            <div class="col-4 pl-lg-0">
                <ul class="navbar-nav">
                    @guest()
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/register') }}">Sign Up</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/logout_now') }}">Logout</a></li>
                    @endguest
                </ul></div>
            <div class="col-4 navbar-nav text-center pr-0 d-none d-lg-block">
                <a class="navbar-brand mr-0" href="{{ url('/') }}">
                    <img src="{{ asset('/favicon.ico') }}">
                    Quizzz
                </a></div>
            <div class="col-4 pr-lg-0">
                <ul class="navbar-nav justify-content-end"><li class="nav-item">
                    </li><li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
                </ul></div>
        </div>
    </div>
</nav>
