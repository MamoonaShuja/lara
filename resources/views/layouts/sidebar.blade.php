<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1>
            <a href="index.html" class="logo">Portfolic <span>Portfolio Agency</span></a>
        </h1>
        <ul class="list-unstyled components mb-5">
            @if (Auth::user()->role == 'admin')
                <li class="active">
                    <a href="{{ route('admin.category.index') }}"><span class="fa fa-home mr-3"></span>Category</a>
                </li>
            @endif
        </ul>

        <div class="footer">
            <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </div>
    </div>
</nav>
