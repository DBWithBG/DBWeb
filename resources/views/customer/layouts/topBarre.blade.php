<div class=" clearfix"></div>

@if(!\Jenssegers\Agent\Facades\Agent::isMobile())
<div class="col-md-12 nopadding">
    <div class="header-section style6 pin-style">
        <div class="container">
            <div class="mod-menu">
                <div class="row">
                    <div class="col-sm-2"><a href="{{url("/")}}" title="" class="logo style-1 mar-4"> <img
                                    src="{{asset('img/logo.png')}}" style="height: 30px; width: 50px" alt=""> </a></div>
                    <div class="col-sm-10">
                        <div class="main-nav">

                            <div id="menu" class="collapse" >
                                <ul class="nav navbar-nav">
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        <li class="right "><a href="{{url('/')}}">Accueil</a>
                                        <li class="right "><a
                                                    href="#">{{\Illuminate\Support\Facades\Auth::user()->customer->surname}}</a>
                                            <span
                                                    class="arrow"></span>
                                            <ul class="dm-align-2">
                                                <li>
                                                    <a href="{{url("/profil")}}">Mon profil</a>
                                                </li>
                                                <li><a href="{{url("logout")}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()">Se déconnecter</a>
                                                </li>

                                            </ul>
                                        </li>
                                    @else
                                        <li class="right "><a href="{{url('/')}}">Accueil</a>

                                        </li>
                                        <li class="right"><a href="{{url('/inscription')}}">Inscription</a>
                                        </li>
                                        <li class="right"><a href="{{url("connexion")}}">Connexion</a> <span
                                                    class="arrow"></span>
                                        </li>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="deconnexion">
                                    </form>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end menu-->

</div>

@endif

<!--end menu-->