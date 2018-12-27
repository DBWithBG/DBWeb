<div class=" clearfix"></div>


<div class="col-md-12 nopadding">
    <div class="header-section style1 pin-style {{Request::is('/') ? 'no-border-bottom' : 'white dark-dropdowns links-dark light-border-bottom'}}">
        <div class="container">
            <div class="mod-menu">
                <div class="row little-padding-bottom-lg">
                    <div class="col-sm-2 little-padding-bottom-sm"> <a href="{{url('/')}}" title="" class="logo style-2 mar-4"> <img src="{{asset('img/logo_plat_milieu.png')}}" alt=""> </a> </div>
                    <div class="col-sm-10">
                        <div class="main-nav">
                            <ul class="nav navbar-nav top-nav">
                                <li class="visible-xs menu-icon"> <a href="javascript:void(0)" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false"> <i aria-hidden="true" class="fa fa-bars"></i> </a> </li>
                            </ul>
                            <div id="menu" class="collapse" aria-expanded="false" style="height: 35px;">
                                <ul class="nav navbar-nav">
                                    <li class="right"> <a href="{{url('/')}}">Accueil</a> </li>

                                    @if (\Illuminate\Support\Facades\Auth::check())
                                        <li class="right"> <a href="#">{{\Illuminate\Support\Facades\Auth::user()->customer->surname}}</a> <span class="arrow"></span>
                                            <ul>
                                                <li> <a href="{{url("/profil")}}">Mon profil</a></li>
                                                <li> <a href="{{url("logout")}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()">Se déconnecter</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"style="display: none;">{{ csrf_field() }}</form>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="right"><a href="{{url("connexion")}}">Connexion</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--end menu-->