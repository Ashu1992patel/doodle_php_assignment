<!-- Navigation start -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#retailAdminNavbar" aria-controls="retailAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="retailAdminNavbar">
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('home*')) ? 'active-page' : '' }}" href="{{ url('home') }}	">
                    <i class="icon-devices_other nav-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ (request()->is('books*')) ? 'active-page' : '' }}"
                    href="{{ url('books') }}" id="formsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-edit1 nav-icon"></i>
                    Books
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="formsDropdown">
                    <li>
                        @can('book-create')
                        <a class="dropdown-item" href="{{ url('import_books/create') }}">Import Books</a>
                        <a class="dropdown-item" href="{{ url('books/create') }}">Add Book</a>                        
                        @endcan
                        <a class="dropdown-item" href="{{ url('books') }}">All Books</a>
                    </li>
                </ul>
            </li>
            
            @can('user-list')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ (request()->is('users*')) ? 'active-page' : '' }}"
                    href="{{ url('users') }}" id="formsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-edit1 nav-icon"></i>
                    Users
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="formsDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ url('users') }}">Users</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('roles') }}">Roles</a>
                    </li>
                </ul>
            </li>
            @endcan

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" id="loginDropdown" role="button"
                    aria-expanded="false">
                    <i class="icon-alert-triangle nav-icon"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- Navigation end -->