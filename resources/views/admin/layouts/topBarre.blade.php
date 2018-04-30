@if(\Illuminate\Support\Facades\Auth::check())
    <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top" color-on-scroll="500">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('/img/logogrand.png')}}" style="height: 71px; width: 300px"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link">
                            <i class="material-icons">person</i> {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{url('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()"
                           class="nav-link">
                            <i class="material-icons">lock</i> Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                            <input type="submit" value="deconnexion">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif