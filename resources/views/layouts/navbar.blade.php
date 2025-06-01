<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="
            @auth
                @if(Auth::user()->role === 'adm')
                    {{ route('admin.home') }}
                @else
                    {{ route('aluno.home') }}
                @endif
            @else
                {{ url('/') }}
            @endauth
        ">
            SIGAC
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>


            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
            @endauth
        </div>
    </div>
</nav>
