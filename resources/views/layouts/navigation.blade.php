<!-- <nav>
    <div>{{Auth::user()->email}}</div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</nav> -->

<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Grupo 1</span>
        <div class="d-flex">
            <a href="{{route('dashboard')}}" class="nav-link"><strong>Anuncios</strong></a>
            <a href="{{route('calendar')}}" class="nav-link"><strong>Calendario</strong></a>
            <a href="{{route('actividades')}}" class="nav-link"><strong>Actividades</strong></a>
            <a href="{{route('chat')}}" class="nav-link"><strong>chat</strong></a>
            <a href="{{route('groupFolder')}}" class="nav-link"><strong>Carpeta de grupo</strong></a>
            
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->email}}
                </a>

                <ul class="dropdown-menu bg-primary active" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
                    <hr>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Cerrar session') }}
                        </x-dropdown-link>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
<br>
<br>
<br>
<br>