<nav class="navbar navbar-expand-lg sticky-navbar mx-3 my-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Add Navbar items here if needed -->
            </ul>
            <div class="d-flex align-items-center position-relative">
                <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2"
                     id="profile-pic" style="cursor: pointer;">
                <i class="bx bx-chevron-down" style="cursor: pointer;" id="dropdown-arrow"></i>
                <div class="profile-menu" id="profile-menu">
                    <a href="#"><i class="bx bx-user"></i> Profile</a>
                    <a href="#"><i class="bx bx-cog"></i> Settings</a>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <a onclick="document.getElementById('logout-form').submit();" href="#"><i class="bx bx-log-out"></i>Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
