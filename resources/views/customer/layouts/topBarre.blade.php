<div class=" clearfix"></div>
<style>
    * {
        font-family: arial;
    }

    body {
        background-color: #333;
    }

    .languagepicker {
        background-color: #FFF;
        display: inline-block;
        padding: 0;
        height: 40px;
        overflow: hidden;
        transition: all .3s ease;
        margin: 0 50px 10px 0;
        vertical-align: top;
        float: left;
    }

    .languagepicker:hover {
        /* don't forget the 1px border */
        height: 81px;
    }

    .languagepicker a{
        color: #ffffff;
        text-decoration: none;
    }

    .languagepicker li {
        display: block;
        padding: 0px 20px;
        line-height: 40px;
        border-top: 1px solid #EEE;
    }

    .languagepicker li:hover{
    }

    .languagepicker a:first-child li {
        border: none;
    }

    .languagepicker li img {
        margin-right: 5px;
    }

    .roundborders {
        border-radius: 5px;
    }

    .large:hover {
        /*
        don't forget the 1px border!
        The first language is 40px heigh,
        the others are 41px
        */
        height: 245px;
    }
</style>

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
                                    <li class="right"> <a href="{{url('/')}}">{{trans('layout.accueil')}}</a> </li>

                                    @if (\Illuminate\Support\Facades\Auth::check())
                                        <li class="right"> <a href="#">{{\Illuminate\Support\Facades\Auth::user()->customer->surname}}</a> <span class="arrow"></span>
                                            <ul>
                                                <li> <a href="{{url("/profil")}}">{{trans('layout.monprofil')}}</a></li>
                                                <li> <a href="{{url("logout")}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()">{{trans('layout.sedeconnecter')}}</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"style="display: none;">{{ csrf_field() }}</form>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="right"><a href="{{url("connexion")}}">{{trans('layout.connexion')}}</a></li>
                                    @endif
                                    <ul class="languagepicker" style="margin-top: 20px;background-color: transparent;color: white">
                                        @if(\Illuminate\Support\Facades\App::isLocale('fr'))
                                            <a  href="{{url('language/fr')}}"><li><img src="{!! asset("img/minifr.png") !!}" style="color: white"/>{{trans('layout.francais')}}</li></a>
                                            <a href="{{url('language/en')}}"><li><img src="{!! asset("img/minien.png") !!}"/>{{trans('layout.anglais')}}</li></a>
                                        @else
                                            <a href="{{url('language/en')}}"><li><img src="{!! asset("img/minien.png") !!}"/>{{trans('layout.anglais')}}</li></a>
                                            <a href="{{url('language/fr')}}"><li><img src="{!! asset("img/minifr.png") !!}"/> {{trans('layout.francais')}}</li></a>
                                        @endif
                                    </ul>
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