<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Add your site or application content here -->
<!--Start-Preloader-area-->
<div class="preloader">
    <div class="loading-center">
        <div class="loading-center-absolute">
            <div class="object object_one"></div>
            <div class="object object_two"></div>
            <div class="object object_three"></div>
        </div>
    </div>
</div>
<!--end-Preloader-area-->
<!--header-area-start-->
<!--Start-main-wrapper-->
<div class="page-1">
    <!--Start-Header-area-->
    <header>
        <div class="header-top-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="header-top-left">
                            <!--Start-welcome-message-->
                            <div class="welcome-mg hidden-xs"><span>Bienvenue sur l'espace In'Bô dédié aux professionnels</span>
                            </div>
                            <!--End-welcome-message-->
                        </div>
                    </div>
                    <!-- Start-Header-links -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="header-top-right">
                            <div class="top-link-wrap">
                                <div class="single-link">
                                    <div class="my-account"><a href="{{url('connexion')}}"><span
                                                    class="">
                                                @if(\App\Http\Controllers\HomeController::isLog() && !empty($sess))
                                                    {{$sess->nom}}

                                                @else
                                                    Connexion
                                                @endif
                                            </span></a>
                                    </div>
                                    @if(\App\Http\Controllers\HomeController::isLog())
                                        <div class="top-link-wrap">
                                            <div class="single-link">
                                                <a href="{{url('deconnexion')}}">Déconnexion</a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End-Header-links -->
                </div>
            </div>
        </div>
        <!--Start-header-mid-area-->
        <div class="header-mid-wrap">
            <div class="container">
                <div class="header-mid-content">
                    <div class="row">
                        <!--Start-logo-area-->
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="header-logo">
                                <a href="{{url('/')}}"><img style="width: 180px; height: 80px"
                                                            src="{!!  asset('inbo/images/product-inbo/logo_inbo_final.png') !!}"
                                                            alt="In'Bô"></a>
                            </div>
                        </div>
                        <!--End-logo-area-->

                        <!--Start-cart-wrap-->
                        @if(empty($sess->id))
                            <?php $panier = []; $total = 0; $sess['id'] = ''; $q_totale = 0?>
                        @else
                            <?php $panier = \App\Panier::where('id_session', $sess->id)->get(); $total = 0; $q_totale = 0?>
                        @endif
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
                            <ul class="header-cart-wrap">
                                <li><a class="cart" href="{{url('panier')}}">Panier : <span class="nb_produits"></span>
                                        produits</a>
                                    <div class="mini-cart-content">
                                        <div class="cart-products-list">
                                            @foreach($panier as $produit)
                                                <?php $explode = explode(' ', $produit->nom); $q_totale += $produit->quantite;
                                                if (($explode[0] == 'Monture') || ($explode[0] == 'Lunettes')) {
                                                    $type = 'lunettes';
                                                } else {
                                                    $type = 'skateboard';
                                                } ?>
                                                <?php $total += $produit->prix * $produit->quantite?>
                                                <div class="sing-cart-pro produit-{{$produit->id}}">
                                                    <div class="cart-image">
                                                        <a href="{{url($type.'/'.$explode[1])}}"><img
                                                                    src="{!!  asset('') !!}"
                                                                    alt=""></a>
                                                    </div>
                                                    <div class="cart-product-info">
                                                        <a href="{{url($type.'/'.$explode[1])}}"
                                                           class="product-name"> {{$produit->nom}} </a>
                                                        <div class="cart-price">
                                                            <span class="quantity"><strong> <span
                                                                            class="js-quantite-panier-{{$produit->id}}">{{$produit->quantite}}</span>
                                                                    x</strong></span>
                                                            <span class="p-price">{{number_format($produit->prix, 2, ',', ' ')}}
                                                                €</span>
                                                        </div>
                                                        <a class="edit-pro" title="edit"><i
                                                                    class="fa fa-pencil-square-o"></i></a>
                                                        <a class="remove-pro" title="remove" data-id="{{$produit->id}}"><i
                                                                    class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="cart-price-list">
                                            <p class="price-amount"><span class="cart-subtotal">Sous-total :</span>
                                                <span class="prix_total">{{number_format($total, 2, ',', ' ')}} €</span>
                                            </p>
                                            <div class="cart-checkout">
                                                <a href="{{url('panier')}}">Accèder au Panier</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--End-cart-wrap-->
                    </div>
                </div>
            </div>
        </div>
        <!--End-header-mid-area-->
        <!--Start-Mainmenu-area -->
        <div class="mainmenu-area hidden-sm hidden-xs">
            <div id="sticker">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                            <div class="log-small"><a class="logo" href="index.html"><img alt="OurStore"
                                                                                          style="width: 150px; height: 55px"
                                                                                          src="{!!  asset('inbo/images/product-inbo/logo_inbo_final.png') !!}"></a>
                            </div>
                            <div class="mainmenu">
                                <nav>
                                    <ul id="nav">
                                        <li class=" {{ Request::is('/')
            ? ' active-menu' : '' }}"><a href="{{url('/')}}">Accueil</a>
                                        </li>
                                        <li class="angle-down {{ Request::is('lunettes*')
            ? ' active-menu' : '' }}"><a href="{{url('lunettes')}}">Lunettes </a>
                                            <div class="megamenu">
                                                <div class="megamenu-list">
                                                            <span class="mega-single">
                                                                <a href="{{url('lunettes')}}" class="mega-title">Collection Publique</a>
                                                                @foreach($p_lunettes as $p_lunette)
                                                                    <a href="{{url('lunettes/'.$p_lunette->nom)}}">{{$p_lunette->nom}}</a>
                                                                @endforeach
                                                            </span>
                                                    <span class="mega-single">
                                                                <a href="{{url('lunettes')}}" class="mega-title">Collection Opticien</a>
                                                        @foreach($o_lunettes as $o_lunette)
                                                            <a href="{{url('lunettes/'.$o_lunette->nom)}}">{{$o_lunette->nom}}</a>
                                                        @endforeach
                                                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="angle-down {{ Request::is('skateboards*')
            ? ' active-menu' : '' }}"><a href="{{url('skateboards')}}">Skateboards</a>
                                            <div class="megamenu">
                                                <div class="megamenu-list">
                                                            <span class="mega-single">
                                                                <a href="{{url('skateboards')}}"
                                                                   class="mega-title">Mini</a>

                                                                @foreach($skateboards['s1'] as $skateboard)
                                                                    <a href="{{url('skateboards/'.$skateboard->nom)}}">{{$skateboard->nom}}</a>

                                                                @endforeach
                                                                                                                            </span>

                                                    <span class="mega-single">

                                                                <a href="{{url('skateboards')}}" class="mega-title">Cruiser</a>
                                                        @foreach($skateboards['s2'] as $skateboard)
                                                            <a href="{{url('skateboards/'.$skateboard->nom)}}">{{$skateboard->nom}}</a>
                                                        @endforeach
                                                    </span>
                                                    <span class="mega-single">
                                                                <a href="{{url('skateboards')}}" class="mega-title">Longboard</a>
                                                        @foreach($skateboards['s3'] as $skateboard)
                                                            <a href="{{url('skateboards/'.$skateboard->nom)}}">{{$skateboard->nom}}</a>
                                                        @endforeach

                                                            </span>


                                                </div>
                                            </div>
                                        </li>
                                        <li class="angle-down {{ Request::is('mon-compte*')
            ? ' active-menu' : '' }}"><a href="{{url('mon-compte')}}">Mon compte revendeur</a>
                                            <div class="megamenu">
                                                <div class="megamenu-list">
                                                            <span class="mega-single">
                                                                <a href="{{url('mon-compte/commandes')}}" class="mega-title">Historique commandes</a>
                                                            </span>
                                                </div>
                                                <div class="megamenu-list">
                                                    <span class="mega-single">
                                                                <a href="{{url('mon-compte/livraisons')}}" class="mega-title">Adresses de livraisons</a>
                                                            </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-Mainmenu-area-->
        <!--Start-Mobile-Menu-Area -->
        <div class="mobile-menu-area visible-sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li class=" {{ Request::is('/')
            ? ' active-menu' : '' }}"><a href="{{url('/')}}">Accueil</a>
                                    </li>
                                    <li class="angle-down {{ Request::is('lunettes*')
            ? ' active-menu' : '' }}"><a href="{{url('lunettes')}}">Lunettes</a>

                                    </li>
                                    <li class="angle-down {{ Request::is('skateboards*')
            ? ' active-menu' : '' }}"><a href="{{url('skateboards')}}">Skateboards</a>

                                    </li>
                                    <li class="{{ Request::is('mon-compte*')
            ? ' active-menu' : '' }}"><a href="{{url('mon-compte')}}">Mon compte revendeur</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-Mobile-Menu-Area -->
    </header>
    <!--End-Header-area-->
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function ($) {
            $('.nb_produits').html("{{$q_totale}}");

            $('body').on('click', 'a.remove-pro', function () {
                id_produit = this.dataset.id;
                $.ajax({
                    type: "POST",
                    url: '{{url('remove_produit_from_panier')}}',
                    data: {_token: CSRF_TOKEN, idProduit: id_produit, idSession: '{{$sess['id']}}'},
                    success: function (response) {

                        $('.produit-' + response.id_produit).hide();
                        $('.prix_total').html(response.prix_total);
                        nb = $('.nb_produits').html();
                        $('.nb_produits').html(nb - response.qty);
                    }
                });
            });

        });
    </script>