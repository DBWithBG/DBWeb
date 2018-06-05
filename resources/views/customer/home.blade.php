@extends('customer.layouts.app')

@section('content')

    <div class="col-md-12 nopadding">
        <div class="header-section style1 pin-style">
            <div class="container">
                <div class="mod-menu">
                    <div class="row">
                        <div class="col-sm-2"><a href="{{url("/")}}" title="" class="logo style-2 mar-4"> <img
                                        src="{{asset('img/logo.png')}}" alt=""> </a></div>
                        <div class="col-sm-10">
                            <div class="main-nav">
                                <ul class="nav navbar-nav top-nav">
                                    <li class="search-parent"><a href="javascript:void(0)" title=""><i
                                                    aria-hidden="true" class="fa fa-search"></i></a>
                                        <div class="search-box ">
                                            <div class="content">
                                                <div class="form-control">
                                                    <input type="text" placeholder="Type to search"/>
                                                    <a href="#" class="search-btn mar-1"><i aria-hidden="true"
                                                                                            class="fa fa-search"></i></a>
                                                </div>
                                                <a href="#" class="close-btn mar-1">x</a></div>
                                        </div>
                                    </li>
                                    <li class="cart-parent"><a href="javascript:void(0)" title=""> <i aria-hidden="true"
                                                                                                      class="fa fa-shopping-cart"></i>
                                            <span class="number mar2"> 4 </span> </a>
                                        <div class="cart-box">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-xs-8"> 2 item(s)</div>
                                                    <div class="col-xs-4 text-right"><span>$99</span></div>
                                                </div>
                                                <ul>
                                                    <li><img src="http://via.placeholder.com/80x80" alt=""> Jean &
                                                        Teashirt <span>$30</span> <a href="#" title=""
                                                                                     class="close-btn">x</a></li>
                                                    <li><img src="http://via.placeholder.com/80x80" alt=""> Jean &
                                                        Teashirt <span>$30</span> <a href="#" title=""
                                                                                     class="close-btn">x</a></li>
                                                </ul>
                                                <div class="row">
                                                    <div class="col-xs-6"><a href="#" title="View Cart"
                                                                             class="btn btn-block btn-warning">View
                                                            Cart</a></div>
                                                    <div class="col-xs-6"><a href="#" title="Check out"
                                                                             class="btn btn-block btn-primary">Check
                                                            out</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="visible-xs menu-icon"><a href="javascript:void(0)"
                                                                        class="navbar-toggle collapsed"
                                                                        data-toggle="collapse" data-target="#menu"
                                                                        aria-expanded="false"> <i aria-hidden="true"
                                                                                                  class="fa fa-bars"></i>
                                        </a></li>
                                </ul>
                                <div id="menu" class="collapse">
                                    <ul class="nav navbar-nav">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <li class="right active"><a
                                                        href="#">{{\Illuminate\Support\Facades\Auth::user()->customer->surname}}</a>
                                                <span
                                                        class="arrow"></span>
                                                <ul class="dm-align-2">
                                                    <li><a href="index2.html">Mon profil</a></li>
                                                    <li><a href="{{url("logout")}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()">Se déconnecter</a>
                                                    </li>

                                                </ul>
                                            </li>
                                        @else
                                            <li class="right active"><a href="#">Accueil</a>

                                            </li>
                                            <li class="right"><a href="#">Inscription</a> <span
                                                        class="arrow"></span>
                                                <ul class="dm-align-2">
                                                    <li><a href="{{url("inscription")}}">Client</a></li>
                                                    <li><a href="{{url("drivers/register")}}">Chauffeur</a></li>

                                                </ul>
                                            </li>
                                            <li class="right"><a href="#">Connexion</a> <span
                                                        class="arrow"></span>
                                                <ul class="dm-align-2">
                                                    <li><a href="{{url("connexion")}}">Client</a></li>
                                                    <li><a href="{{url("driver/login")}}">Chauffeur</a></li>

                                                </ul>
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
    <!--end menu-->

    <div class="clearfix"></div>

    <!-- START REVOLUTION SLIDER 5.0 -->
    <div class="slide-tmargin">
        <div class="slidermaxwidth">
            <div class="rev_slider_wrapper">
                <!-- START REVOLUTION SLIDER 5.0 auto mode -->
                <div id="rev_slider" class="rev_slider" data-version="5.0">
                    <ul>


                        <!-- SLIDE  -->
                        <li data-index="rs-1" data-transition="">

                            <!-- MAIN IMAGE -->
                            <img src="http://via.placeholder.com/2000x1300" alt="" width="1920" height="1280">

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption raleway white uppercase text-white tp-resizeme"
                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['270','240','240','200']"
                                 data-fontsize="['16','16','14','14']"
                                 data-lineheight="['70','70','70','50']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:0px;"
                                 data-mask_out="x:inherit;y:inherit;"
                                 data-start="2000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap;">
                            </div>

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption montserrat fweight-6 text-white tp-resizeme"
                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['320','100','100','110']"
                                 data-fontsize="['70','70','50','30']"
                                 data-lineheight="['100','100','100','50']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:0px;"
                                 data-mask_out="x:inherit;y:inherit;"
                                 data-start="1000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap;">Vos bagages Notre mission
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption montserrat fweight-6 text-white tp-resizeme"
                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['390','150','150','150']"
                                 data-fontsize="['70','60','50','30']"
                                 data-lineheight="['100','100','100','50']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:0px;"
                                 data-mask_out="x:inherit;y:inherit;"
                                 data-start="1500"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap;">Deliverbag
                            </div>

                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption sbut2 btn-round"
                                 data-x="['center','center','center','center']"
                                 data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['550','350','370','300']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6">
                                <div class="sp-feature-box-4 ">
                                    <form method="POST" action="{{url("")}}">
                                        {{csrf_field()}}
                                        <input id="adresse_input_depart" type="search" placeholder="Adresse de départ">
                                        <input id="adresse_input_arrivee" type="search" placeholder="Adresse d'arrivée">
                                        <a class="depart">Go</a>
                                    </form>
                                </div>
                                <div class="sp-feature-box-4 " style="margin-top: 20px">
                                    <form method="POST" action="{{url("")}}">
                                        {{csrf_field()}}
                                        <input type="search" placeholder="Numéro de train">
                                        <input type="search" placeholder="Numéro d'avion">
                                        <a class="arrivee">Go</a>
                                    </form>
                                </div>
                            </div>

                            <!-- LAYER NR. 3 -->

                        </li>
                    </ul>
                </div>
                <!-- END REVOLUTION SLIDER -->
            </div>
        </div>
        <!-- END REVOLUTION SLIDER WRAPPER -->
    </div>
    <div class="clearfix"></div>
    <!-- END OF SLIDER WRAPPER -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" ce-feature-box-37">
                        <div class="col-md-4">
                            <div class="text-box text-center">
                                <div class="icon-plain-medium center white icon"><span class="pe-7s-monitor"></span>
                                </div>
                                <br/>
                                <h5 class="title font-weight-5 text-white">Fully Responsive</h5>
                                <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                    faucibus orci luctus ultrices posuere cubilia Curae.</p>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="text-box text-center">
                                <div class="icon-plain-medium center white icon"><span
                                            class="pe-7s-photo-gallery"></span></div>
                                <br/>
                                <h5 class="title font-weight-5 text-white">Classic Styles</h5>
                                <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                    faucibus orci luctus ultrices posuere cubilia Curae.</p>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="text-box no-border text-center">
                                <div class="icon-plain-medium center white icon"><span class="pe-7s-lock"></span></div>
                                <br/>
                                <h5 class="title font-weight-5 text-white">Secure Services</h5>
                                <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                    faucibus orci luctus ultrices posuere cubilia Curae.</p>
                            </div>
                        </div>
                        <!--end item-->
                    </div>
                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->





@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {
            initAutocomplete();
        });
        /****************** Autocomplete google *********************/

        var autocompleteKey = 'AIzaSyCATTjk7-Kxr-Zzudmp-E9UXWnUVIgITpw';

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocompleteDepart = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('adresse_input_depart')),
                {

                    types: ['address'],
                    language: 'fr',
                    componentRestrictions: {country : 'fr'}
                });

            autocompleteArrivee = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('adresse_input_arrivee')),
                {
                    types: ['address'],
                    language: 'fr',
                    componentRestrictions: {country : 'fr'}
                });

            autocompleteDepart.addListener('place_changed', function() {
                if (this.getPlace().geometry.location){
                    start_pos = this.getPlace().geometry.location;
                    verifyDepartment(this.getPlace());
                }
            });

            autocompleteArrivee.addListener('place_changed', function() {
                end_pos = this.getPlace().geometry.location;
                verifyDepartment(this.getPlace());
            });

        }

        function verifyDepartment(place){
            //var bdx_metropole = {33130, 33370 ,33110,33170,33700,33185,33530,33127,33400,33810,33290,33150,33520,33160,33310,33440,33270,33140,33560,33600,33320,33800,33100,33000,33200,33300};
            var res = place.address_components;
            var found = false;
            var gironde = '33';
            for (var i = 0; i < res.length; i++) {
                for (var j = 0; j < res[i].types.length; j++) {
                    if (res[i].types[j] == "postal_code") {
                        found = true;
                        // We use FOUND to know if there is a postal code for the place
                        // For exemple, there is no postal code for Paris
                        var dep = res[i].long_name;
                        if (dep.substr(0,2) !== gironde){
                            //  two first numbers are taken to verify the department
                            found = false;
                            break;
                        }
                    }
                }
            }
            if (!found){
                alert("Le service n’est pour le moment disponible qu’en Gironde (33).");
            }
        }


        /*********** API SNCF ***************************/
        var train = tpj('#input_train').val();
        var domain = 'https://data.sncf.com/';
        var key = '7308cd76-a20f-4f01-9cc3-59d4742bba24';

        tpj(function () { // this will be called when the DOM is ready
            initAutocomplete();
            tpj('#input_train').on('input paste', function () {
                var val = $('#input_train').val();
                var dateVoyage = $('#date').val();
                //  since=20170407T120000&until=20170407T120100
                if (dateVoyage != '') {
                    dateVoyage = (dateVoyage.split('-').join('')) + "T000000";
                    if (val.length == 4) {
                        $.get('https://api.sncf.com/v1/coverage/sncf/vehicle_journeys/?headsign=${val}&since=${dateVoyage}&key=7308cd76-a20f-4f01-9cc3-59d4742bba24 ', function (data) {
                            traitement_gares(data);
                        });
                    }
                }
                else {
                    console.log("date de voyage non spécifiée");
                }
            });
        });

        /************** Fin API SNCF *********************/


    </script>
@endsection