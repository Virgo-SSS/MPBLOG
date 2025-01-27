<nav class="navbar navbar-expand-lg sticky-navbar mx-3 my-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="bx bx-home"> </i> Home
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center position-relative">
                <img src="{{ asset('images/virgo.jpeg') }}" alt="Profile" class="rounded-circle me-2" 
                    width="30" height="30"
                    id="profile-pic" style="cursor: pointer;">
                <span class="text-black">{{ Auth::user()->name }}</span>

                <i class="bx bx-chevron-down" style="cursor: pointer;" id="dropdown-arrow"></i>
                <div class="profile-menu" id="profile-menu">
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <a onclick="document.getElementById('logout-form').submit();" href="#"><i class="bx bx-log-out"></i>Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
