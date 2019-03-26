@extends('customer.layouts.app')

@section('content')


    <!-- Hero Section -->
    <section>
        <div class="hero-box">
            <div class="container">
                <div class="row">
                    <div class="hero-text align-center">
                        <h1>Vos bagages</h1>
                        <p>Notre mission</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="row">

                            <div class="smart-wrap">
                                <div style="border-radius: 2px"
                                     class="smart-forms smart-container wrap-3">


                                    <form method="POST" action="#">
                                        {{csrf_field()}}

                                        <div class="form-body">
                                            <div class="row">
                                                <span class="voyage-train">Voyage en avion ou train ?</span>
                                                <div class="modal-buttons">
                                                    <label onclick="openTrainModal()"
                                                           class="button btn-primary"><i
                                                                class="fa fa-train"></i></label>
                                                    <label onclick="openPlaneModal()"
                                                           class="button btn-primary"><i
                                                                class="fa fa-plane"></i></label><br>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <label class="field prepend-icon" style="margin-top: 10px">

                                                    <input id="adresse_input_depart" type="search"
                                                           class="gui-input"
                                                           placeholder="Lieu de prise en charge">
                                                    <span class="field-icon"><i class="fa fa-arrow-right"></i></span>
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="field prepend-icon">
                                                    <input id="adresse_input_arrivee" type="search"
                                                           class="gui-input"
                                                           placeholder="Lieu de livraison">
                                                    <span class="field-icon"><i class="fa fa-arrow-left"></i></span>
                                                </label>
                                            </div>
                                            <div class="row">

                                                <label class="field prepend-icon" >
                                                    <input id="input_nb_bags" type="number" class="gui-input" placeholder="Nombre de bagages">
                                                    <span class="field-icon"><i class="fa fa-shopping-bag"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-footer">
                                            <label class="js_valid_deliver button btn-primary">
                                                Valider
                                            </label>

                                        </div>
                                    </form>
                                </div><!-- end .smart-forms section -->
                            </div><!-- end .smart-wrap section -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal train -->
    <div class="modal fade" id="trainModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Vous voyagez en train</b></h5>
                </div>
                <div class="modal-body">
                    <div class="smart-wrap" style="min-height: 140px">
                        <div class="smart-forms">


                            <div class="form-body">
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_train" type="search" class="gui-input"
                                               placeholder="Numéro de train">
                                        <span class="field-icon"><i class="fa fa-train"></i></span>
                                    </label>
                                </div>
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_train_date" type="date" class="gui-input"
                                               placeholder="Date de départ">
                                        <span class="field-icon"><i class="fa fa-calendar"></i></span>
                                    </label>
                                </div>
                            </div>
                            <p id="infos-train" style="color: orangered;"></p>


                        </div><!-- end .smart-forms section -->
                    </div><!-- end .smart-wrap section -->
                </div>
                <div class="modal-footer smart-forms">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!--<button type="button" class="button btn-primary" data-dismiss="modal">Confirmer</button>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal avion -->
    <div class="modal fade" id="planeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Vous voyagez en avion</b></h5>
                </div>
                <div class="modal-body">
                    <div class="smart-wrap" style="min-height: 140px">
                        <div class="smart-forms">


                            <div class="form-body">
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_fly" type="search" class="gui-input"
                                               placeholder="Numéro de votre avion">
                                        <span class="field-icon"><i class="fa fa-plane"></i></span>
                                    </label>
                                </div>
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_fly_date" type="date" class="gui-input"
                                               placeholder="Date de départ">
                                        <span class="field-icon"><i class="fa fa-calendar"></i></span>
                                    </label>
                                </div>
                            </div>
                            <p id="infos"></p>


                        </div><!-- end .smart-forms section -->
                    </div><!-- end .smart-wrap section -->
                </div>
                <div class="modal-footer smart-forms">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!--<button type="button" class="button btn-primary">Confirmer</button>-->
                </div>
            </div>
        </div>
    </div>
    </section>



    <?php if (\Illuminate\Support\Facades\Auth::check()) {
        $customer = \Illuminate\Support\Facades\Auth::user()->customer->id;
    } else {
        $customer = "";
    }

    ?>





@endsection

@section('custom-scripts')
    <script>

        const domain = 'https://data.sncf.com/';
        const key_sncf = '{{config('constants.SNCF_API_KEY')}}';
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const app_id = '{{config('constants.APP_ID_FLIGHT')}}';
        const app_key = '{{config('constants.APP_KEY_FLIGHT')}}';

        // Variable globale...

        var departments;
        var pos_depart_ok = false;
        var pos_arrivee_ok = false;
        var place_arrivee;
        var place_depart;
        var tabGeocSNCF = {};
        var num_train = null;
        var num_vol = null;

        /**
         * Ouverture de la modal train
         **/
        function openTrainModal() {
            $('#trainModal').modal('show');
        }

        /**
         * Ouverture de la modal avion
         **/
        function openPlaneModal() {
            $('#planeModal').modal('show');
        }


        /**
         * Init de Google maps autocomplete
         **/
        function initAutocomplete() {

            const bounds_gironde = new google.maps.LatLngBounds(
                new google.maps.LatLng(44.1939019, -1.2614241),
                new google.maps.LatLng(45.573636, 0.315137)
            );

            const input_depart = document.getElementById('adresse_input_depart');
            const input_arrivee = document.getElementById('adresse_input_arrivee');

            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocompleteDepart = new google.maps.places.Autocomplete(input_depart, {
                bounds: bounds_gironde,
                language: 'fr',
                componentRestrictions: {country: 'fr'}
            });

            autocompleteArrivee = new google.maps.places.Autocomplete(input_arrivee, {
                bounds: bounds_gironde,
                language: 'fr',
                componentRestrictions: {country: 'fr'}
            });


            autocompleteDepart.addListener('place_changed', function () {
                if (this.getPlace().geometry.location) {
                    start_pos = this.getPlace().geometry.location;
                    if (verifyDepartment(this.getPlace())) {
                        pos_depart_ok = true;
                        place_depart = this.getPlace();
                    } else {
                        printErrorDepartments(true);
                        input_depart.value = '';
                    }
                }
            });

            autocompleteArrivee.addListener('place_changed', function () {
                end_pos = this.getPlace().geometry.location;
                if (verifyDepartment(this.getPlace())) {
                    pos_arrivee_ok = true;
                    place_arrivee = this.getPlace();
                } else {
                    printErrorDepartments(false);
                    input_arrivee.value = '';
                }
            });

        }

        /**
         * Affichage de l'erreur quand le département n'est pas pris en charge
         **/
        function printErrorDepartments(depart) {
            var dep_string = "";
            for (var k = 0; k < departments.length; k++) {
                dep_string += departments[k].name + " (" + departments[k].number + ") "
            }
            if (depart) swal("Départ : Le service n'est disponible que dans les départements suivants : " + dep_string);
            else swal("Arrivée : Le service n'est disponible que dans les départements suivants : " + dep_string);
        }

        /**
         * Call API SNCF
         **/
        function call_sncf() {
            var val = $('#input_train').val();
            var dateVoyage = $('#input_train_date').val();
            console.log(dateVoyage);
            //  since=20170407T120000&until=20170407T120100
            if (dateVoyage != '') {
                dateVoyage = (dateVoyage.split('-').join('')) + "T000000";
                if (val.length >= 4) {

                    $.get('https://api.sncf.com/v1/coverage/sncf/vehicle_journeys/?headsign=' + val + '&since=' + dateVoyage + '&key=' + key_sncf + ' ', function (data) {
                        $('#infos-train').html('');
                        data['num_train'] = val;
                        traitement_gares(data);
                    }).fail(function () {
                        $('#infos-train').html('Train introuvable');
                        //swal("Ce numéro de train n'est pas valide");
                        //$('#input_train_date').val(null);
                    });
                } else {
                    swal("Numéro de billet invalide");
                }
            } else {
                //swal("date de voyage non spécifiée");
            }
        }

        /**
         * Traitement des gares récupérées avec l'api SNCF
         **/
        function traitement_gares(data) {
            var stops = data.vehicle_journeys[0].stop_times;
            var geocoders_promises = [];
            for (var i = 0; i < stops.length; i++) {
                var pos = {
                    lat: parseFloat(stops[i].stop_point.coord.lat),
                    lng: parseFloat(stops[i].stop_point.coord.lon)
                };
                geocoders_promises.push(geocode(pos, stops[i].stop_point.name));
            }

            $.when(...geocoders_promises).then(function (values) {
                var tabButtons = {};
                for (var key in tabGeocSNCF) {
                    tabButtons[key] = {
                        'text': key,
                        'value': key
                    };
                }

                if (tabButtons.length === 0) {
                    swal('Aucune gare trouvée pour ce numéro de train');
                }
                swal("Dans quelle gare arrivez-vous ?", {
                    buttons: tabButtons
                }).then((value) => {
                    $('#adresse_input_depart').val(value);

                    num_vol = null;

                    if (value == null) {
                        num_train = null;
                        swal("Aucune gare choisie");
                    } else {
                        num_train = data['num_train'];
                        pos_depart_ok = true;
                        place_depart = tabGeocSNCF[value];
                        $('#trainModal').modal('hide');
                    }

                });


            });
        }

        /**
         * Géocode
         **/
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


        /**
         * Vérifie si l'adresse est dans les départements valide [TRUE] si ok [FALSE] sinon
         **/
        function verifyDepartment(place) {
            //var bdx_metropole = {33130, 33370 ,33110,33170,33700,33185,33530,33127,33400,33810,33290,33150,33520,33160,33310,33440,33270,33140,33560,33600,33320,33800,33100,33000,33200,33300};
            var res = place.address_components;
            var found = false;
            for(i=0; i< res.length; i++) {
                if(res[i].types.includes("administrative_area_level_2")) {
                    for (var k = 0; k < departments.length; k++) {
                        //console.log(departments[k].number);

                        if (res[i].long_name == departments[k].name) {
                            found = true;//On a trouvé une correspondance
                            break;
                        }
                    }
                }
                if (found) break;
            }
            return found;
        }

        /**
         * API Flight stats
         **/
        function flightStats() {

            console.log('flights stats');

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
                    url: 'https://api.flightstats.com/flex/flightstatus/rest/v2/jsonp/flight/status/' + compagny + '/' + flight_number + '/arr/' + year + '/' + month + '/' + day + '?appId=' + app_id + '&appKey=' + app_key + '&utc=false',
                    dataType: 'jsonp',
                    success: function (data) {
                        var res = data.flightStatuses[0];
                        //var dateRunway = new Date(res.operationalTimes.estimatedRunwayArrival.dateLocal) ; //NOT ALWAYS DFINED !!!!!
                        var dateGate = new Date(res.operationalTimes.scheduledGateArrival.dateLocal);
                        if (res.operationalTimes.estimatedGateArrival) {
                            dateGate = new Date(res.operationalTimes.estimatedGateArrival.dateLocal); //RUNWAY OR GATE
                        }

                        num_train = null;
                        num_vol = vol;

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
                        console.log(arrival_airport);
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
            } else {
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


        function setCopyrightYear() {
            var year_span = document.getElementById('year');
            const year = (new Date()).getFullYear();
            year_span.textContent = year;
        }


        $(document).ready(function () {
            // On est sur que la lib google maps est load
            $(window).load(function () {


                $('#input_train').on('input paste', function () {
                    call_sncf();
                });

                $('#input_train_date').on('change', function () {
                    call_sncf();
                });

                $('#js-avion').on('click', function () {
                    flightStats();
                });

                initAutocomplete();

                //Récupération des departements autorisés
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

                $('.show-train').on('click', function () {
                    $('.js-show-train').show();
                    $(this).hide();
                });

                $('.show-flight').on('click', function () {
                    $('.js-show-flight').show();
                    $(this).hide()
                });

                $('.js_valid_deliver').on('click', function () {
                    console.log("Val is " + $('#input_nb_bags').val());

                    var nb_bags = parseInt($('#input_nb_bags').val());

                    console.log("Nb bags is " + nb_bags);


                    if (!(nb_bags > 0)) {
                        swal("Veuillez saisir le nombre de bagages à transporter");
                    }

                    if (nb_bags > 0 && pos_depart_ok && pos_arrivee_ok) {

                        bagages = [];
                        for (var i = 0; i < nb_bags; i++) {
                            bagages.push({name: 'Bagage' + i, desc: ''});
                        }

                        delivery = {
                            customer_id: "{{$customer}}",
                            bagages: {
                                1: bagages
                            },
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
                                swal({
                                    title: 'Confirmer la prise en charge ?',
                                    text: "Avec un bagage, cette course coûterait " + parseFloat(response.price).toFixed(2) + " €",
                                    icon: 'success',
                                    buttons: {
                                        cancel: false,
                                        canceled: {
                                            text: "Annuler",
                                            value: "cancel"
                                        },
                                        roll: {
                                            text: "Finaliser ma demande !",
                                            value: "confirm",
                                        },
                                    },
                                }).then((result) => {

                                    if (result === 'confirm') {
                                        var url = "{{url('delivery')}}" + '/' + response.id + '/save';

                                        if (num_train != null) url += '?num_train=' + num_train;
                                        else if (num_vol != null) url += '?num_vol=' + num_vol;

                                        document.location.href = url;
                                    } else if (result === 'cancel') {
                                        swal({
                                            icon: 'success',
                                            title: 'Annulation',
                                            text: 'La prise en charge est annulée'
                                        });
                                    }
                                })

                            }

                        });
                    } else {
                        if (!pos_depart_ok) {
                            swal("Veuillez vérifier la position de départ");
                        }

                        if (!pos_arrivee_ok) {
                            swal("Veuillez vérifier la position d'arrivée");
                        }
                    }


                });

                setCopyrightYear();
            });
        });


    </script>
@endsection