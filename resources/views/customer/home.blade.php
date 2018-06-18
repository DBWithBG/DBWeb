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
                                        <a class="js_valid_deliver">Valider</a>
                                    </form>
                                </div>
                                <div class="sp-feature-box-4 " style="margin-top: 20px">
                                    <form method="POST" action="{{url("")}}">
                                        {{csrf_field()}}
                                        <input id="input_train" type="search" placeholder="Numéro de train">
                                        <input id="input_train_date" type="date" placeholder="Date du voyage">
                                    </form>
                                </div>
                                <div class="sp-feature-box-4 " style="margin-top: 20px">
                                    <form method="POST" action="{{url("")}}">
                                        {{csrf_field()}}
                                        <input id="input_fly" type="search" placeholder="Numéro d'avion">
                                        <input id="input_fly_date" type="date" placeholder="Date du voyage">
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



    <?php if (\Illuminate\Support\Facades\Auth::check()) {
        $customer = \Illuminate\Support\Facades\Auth::user()->customer->id;
    } else {
        $customer = "";
    }

    ?>

@endsection

@section('custom-scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var departments;
        var pos_depart_ok = false;
        var pos_arrivee_ok = false;
        var place_arrivee;
        var place_depart;
        var tabGeocSNCF = {};

        //Récupération des departements autorisés
        $(document).ready(function () {
            initAutocomplete();
            $.ajax({
                type: "POST",
                url: '{{url('ajax/departments')}}',
                data: {
                    _token: CSRF_TOKEN,
                },
                success: function (response) {
                    departments = response;

                }

            });

            $('.js_valid_deliver').on('click', function () {
                if (pos_depart_ok && pos_arrivee_ok) {
                    if("{{$customer}}" == ""){
                        swal("connexion requiered");
                    }else {
                        delivery = {
                            customer_id: "{{$customer}}"
                        };
                        start_position = {
                            lat: place_depart.geometry.location.lat(),
                            lng: place_depart.geometry.location.lng(),
                            address: place_depart.formatted_address
                        };
                        end_position = {
                            lat: place_arrivee.geometry.location.lat(),
                            lng: place_arrivee.geometry.location.lng(),
                            address: place_arrivee.formatted_address
                        };


                        $.ajax({
                            type: "POST",
                            url: '{{url('create/delivery')}}',
                            data: {
                                start_position: start_position,
                                end_position: end_position,
                                delivery: delivery,
                                _token: CSRF_TOKEN

                            },
                            success: function (response) {
                                swal(response);

                            }

                        });
                    }

                }
            });
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
                    componentRestrictions: {country: 'fr'}
                });

            autocompleteArrivee = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('adresse_input_arrivee')),
                {
                    types: ['address'],
                    language: 'fr',
                    componentRestrictions: {country: 'fr'}
                });

            /****************** LISTENERS *********************************/
            autocompleteDepart.addListener('place_changed', function () {
                if (this.getPlace().geometry.location) {
                    start_pos = this.getPlace().geometry.location;
                    if (verifyDepartment(this.getPlace())) {
                        pos_depart_ok = true;
                        place_depart = this.getPlace();
                        swal("L'adresse de départ est OK");
                    } else {
                        printErrorDepartments(true);
                    }
                }
            });

            autocompleteArrivee.addListener('place_changed', function () {
                end_pos = this.getPlace().geometry.location;
                if (verifyDepartment(this.getPlace())) {
                    pos_arrivee_ok = true;
                    place_arrivee = this.getPlace();
                    swal("L'adresse d'arrivée est OK");
                } else {
                    printErrorDepartments(false);
                }
            });
            /******************** FIN LISTENERS *******************************/

        }

        function printErrorDepartments(depart) {
            var dep_string = "";
            for (var k = 0; k < departments.length; k++) {
                dep_string += departments[k].name + " (" + departments[k].number + ") "
            }
            if (depart) swal("Départ : Le service n'est disponible que dans les départements suivants : " + dep_string);
            else swal("Arrivée : Le service n'est disponible que dans les départements suivants : " + dep_string);
        }

        /**
         * Vérifie si l'adresse est dans les départements valide [TRUE] si ok [FALSE] sinon
         **/
        function verifyDepartment(place) {
            //var bdx_metropole = {33130, 33370 ,33110,33170,33700,33185,33530,33127,33400,33810,33290,33150,33520,33160,33310,33440,33270,33140,33560,33600,33320,33800,33100,33000,33200,33300};
            var res = place.address_components;
            var found = false;
            for (var i = 0; i < res.length; i++) {
                for (var j = 0; j < res[i].types.length; j++) {
                    if (res[i].types[j] == "postal_code" || res[i].types[j] == "administrative_area_level_2") {
                        // We use FOUND to know if there is a postal code for the place
                        // For exemple, there is no postal code for Paris
                        var dep = res[i].long_name;
                        for (var k = 0; k < departments.length; k++) {
                            //console.log(departments[k].number);
                            if (dep.substr(0, 2) == departments[k].number) {
                                found = true;//On a trouvé une correspondance
                                break;
                            }
                        }
                    }
                }
            }
            return found;
        }


        /*********** API SNCF ***************************/
        var domain = 'https://data.sncf.com/';
        var key = '7308cd76-a20f-4f01-9cc3-59d4742bba24';

        $(function () { // this will be called when the DOM is ready
            initAutocomplete();
            $('#input_train').on('input paste', function () {

                call_sncf();
            });

            $('#input_train_date').on('change', function () {
                call_sncf();
            });
        });

        function call_sncf() {
            var val = $('#input_train').val();
            var dateVoyage = $('#input_train_date').val();
            //  since=20170407T120000&until=20170407T120100
            if (dateVoyage != '') {
                dateVoyage = (dateVoyage.split('-').join('')) + "T000000";
                if (val.length >= 4) {

                    $.get('https://api.sncf.com/v1/coverage/sncf/vehicle_journeys/?headsign=' + val + '&since=' + dateVoyage + '&key=7308cd76-a20f-4f01-9cc3-59d4742bba24 ', function (data) {
                        traitement_gares(data);
                    });
                } else {
                    swal("Numéro de billet invalide");
                }
            }
            else {
                //swal("date de voyage non spécifiée");
            }
        }

        function traitement_gares(data) {
            $('.choix_gare').remove();
            var stops = data.vehicle_journeys[0].stop_times;
            var geocoders_promises = [];
            for (var i = 0; i < stops.length; i++) {
                var pos = {
                    lat: parseFloat(stops[i].stop_point.coord.lat),
                    lng: parseFloat(stops[i].stop_point.coord.lon)
                };
                geocoders_promises.push(geocode(pos, stops[i].stop_point.name));
                //var returna = geocode(pos);
                //alert(returna);
            }

            $.when(...geocoders_promises).then(function (values) {
                var tabButtons = {};
                for (var key in tabGeocSNCF) {
                    tabButtons[key] = {
                        'text': key,
                        'value': key
                    };
                    //console.log('OK pour : ' + key + " object" + tabGeocSNCF[key]);
                }

                swal("Dans quelle gare arrivez-vous ?", {
                    buttons: tabButtons
                }).then((value) => {
                    $('#adresse_input_depart').val(value);
                    if (value == null) {
                        swal("Aucune gare choisie");
                    }
                    pos_depart_ok = true;
                    place_depart = tabGeocSNCF[value];
                    console.log(place_depart);
                });


            });
        }

        function geocode(pos, name, place) {
            var geocoder = new google.maps.Geocoder();

            var deferred = $.Deferred();

            geocoder.geocode({
                    'latLng': pos
                },
                function (results, status) {
                    // c'est un appel asynchrone donc on doit vérifier que le retour est correct
                    if (status !== google.maps.GeocoderStatus.OK) {

                    }
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (verifyDepartment(results[1])) {
                            tabGeocSNCF[name] = results[1];
                            console.log(name);
                        }
                        console.log("==================================");
                    }
                    deferred.resolve(results);
                });

            return deferred.promise();
        }


        /************** Fin API SNCF *********************/


        /**************** API FLIGHT STATS  EN SUSPEND ***************/

        var app_id = '95a4eb71';
        var app_key = '84cb52736b8c4db53b753b8f87be34a8';


        function flightStats() {

            var vol = $('#input_flight').val();
            var airport = $('#input_airport').val();
            var dateVoyage = $('#date').val();

            var compagny = vol.substring(0, 2);
            var flight_number = vol.substring(2, 6);
            var year = dateVoyage.substring(0, 4);
            var month = dateVoyage.substring(5, 7);
            var day = dateVoyage.substring(8, 10);


            if (vol && dateVoyage) {
                //$.get(`https://api.flightstats.com/flex/flightstatus/rest/v2/jsonp/flight/status/${compagny}/${flight_number}/arr/${year}/${month}/${day}?appId=${app_id}&appKey=${app_key}&utc=false`, function(data){
                //  console.log(data);
                /*
                 * 3 letters code can be annoying for user
                 * there is no need, destination can be checked by a comparaison with an array of destination (from the database)
                 */
                $.ajax({
                    url: 'https://api.flightstats.com/flex/flightstatus/rest/v2/jsonp/flight/status/${compagny}/${flight_number}/arr/${year}/${month}/${day}?appId=${app_id}&appKey=${app_key}&utc=false',
                    dataType: 'jsonp',
                    success: function (data) {
                        var res = data.flightStatuses[0];
                        //var dateRunway = new Date(res.operationalTimes.estimatedRunwayArrival.dateLocal) ; //NOT ALWAYS DFINED !!!!!
                        var dateGate = new Date(res.operationalTimes.scheduledGateArrival.dateLocal);
                        if (res.operationalTimes.estimatedGateArrival) {
                            dateGate = new Date(res.operationalTimes.estimatedGateArrival.dateLocal); //RUNWAY OR GATE
                        }

                        /* var minRunway = dateRunway.getMinutes();
                         if (minRunway<10){
                         minRunway='0'+minRunway;
                         }
                         */
                        console.log(data);
                        var minGate = dateGate.getMinutes();
                        if (minGate < 10) {
                            minGate = '0' + minGate;
                        }
                        var departure_airport = res.departureAirportFsCode;
                        var arrival_airport = res.arrivalAirportFsCode;
                        var arrivee, city;
                        data.appendix.airports.forEach(function (element) {
                            if (element.fs == arrival_airport) {
                                console.log(element);
                                arrivee = element.name;
                                city = element.city;
                            }
                        });


                        if (res.delays) {
                            var delay = res.delays.arrivalGateDelayMinutes;
                            if (delay) {
                                console.log('Il y\'a un retard de ${delay} minute(s) sur ce vol.');
                            }
                        }
                        console.log('Le client sera à la sortie de ${arrivee} (${city}) le ${dateGate.getDate()}/${dateGate.getMonth()+1}/${dateGate.getFullYear()} à ${dateGate.getHours()}h${minGate}');
                        //  console.log(`Le client sera à la porte à ${dateGate.getHours()}h${minGate}`);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
            else {
                if (!vol) {
                    console.log("Vous devez spécifier un numéro de vol");
                }
                if (!airport) {
                    console.log("Vous devez spécifier un aéroport d'arrivée (code à 3 chiffres)");
                }
                if (!dateVoyage) {
                    console.log("Vous devez spécifier une date de voyage");
                }
            }

        }


    </script>
@endsection