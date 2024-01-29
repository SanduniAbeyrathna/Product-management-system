<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('todo.index') }}"><i class="fa-solid fa-gauge-high"></i> Todo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('banner.index') }}"><i class="fa-solid fa-file-image"></i> Banner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fa-solid fa-cube"></i> Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relationship') }}"><i class="fa-solid fa-cubes"></i> Relationship</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Permission
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('permissions.index') }}">Add Permission</a></li>
                        <li><a class="dropdown-item" href="{{ route('roles.index') }}">Role</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Another</a></li>
                    </ul>
                </li>
            </ul>
            {{-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
            <!-- Authentication -->
            @if (Auth::user())
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            @else
                <span><a href="{{ route('login') }}">Login</a></span> ||
                <span><a href="{{ route('register') }}">Register</a></span>
            @endif
        </div>
    </div>
</nav>
