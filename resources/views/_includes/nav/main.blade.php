<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <!-- <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"> -->
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            @if (!Auth::guest())
                <!-- <div class="navbar-start">
                    <a class="navbar-item">
                    Home
                    </a>
                    <a class="navbar-item">
                    Documentation
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            More
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                            About
                            </a>
                            <a class="navbar-item">
                            Jobs
                            </a>
                            <a class="navbar-item">
                            Contact
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                            Report an issue
                            </a>
                        </div>
                    </div>
                </div> -->
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{Auth::user()->name}}
                        </a>

                        <div class="navbar-dropdown">
                            <a href="{{route('manage.dashboard')}}" class="navbar-item"><span class="icon"><i class="fa fa-fw fa-cog"></i></span>Settings</a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span class="icon"><i class="fa fa-fw fa-sign-out"></i></span>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="navbar-end">
                    <a href="{{route('login')}}" class="navbar-item">
                        Login
                    </a>
                    <a href="{{route('register')}}" class="navbar-item">
                        Register
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>
