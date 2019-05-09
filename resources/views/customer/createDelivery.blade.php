@extends('customer.layouts.app')

@section('content')
    <section class="sec-padding section-light">

        <div class="container-fluid" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-box white padding-4">
                            <div class="smartforms-modal-body">
                                <div class="smart-wrap">
                                    <div class="smart-forms smart-container transparent wrap-full">
                                        <div class="form-body no-padd">
                                            <form method="post" action="{{url("savebags/delivery")}}" id="account">
                                                <div class="tagline"><span>Vérification des informations</span></div><!-- .tagline -->
                                                @if(sizeof($errors->all())>0)
                                                    <h3 style="color: #bf3924">{{$errors->all()[0]}}</h3>
                                                @endif

                                                @if($num_train != null)
                                                    <div class="row row-margin">
                                                        <div class="col-md-12">
                                                            <label for="email" class="field-label"><strong>Numéro de train</strong></label>
                                                            <label class="field prepend-icon">
                                                                <input type="text" id="num_train_input"
                                                                       class="gui-input" disabled style="color : black"
                                                                       value="{{$num_train}}">
                                                                <span class="field-icon"><i class="fa fa-train" style="color : black"></i></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($num_vol != null)
                                                    <div class="row row-margin">
                                                        <div class="col-md-12">
                                                            <label for="email" class="field-label"><strong>Numéro de vol</strong></label>
                                                            <label class="field prepend-icon">
                                                                <input type="text" id="num_vol_input"
                                                                       class="gui-input" disabled style="color : black"
                                                                       value="{{$num_vol}}">
                                                                <span class="field-icon"><i class="fa fa-plane" style="color : black"></i></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif


                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label"><strong>Lieu de prise en charge</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input type="text" name="start_position[address]" id="adresse_input_depart"
                                                                   class="gui-input" style="color : black"
                                                                   placeholder="Adresse" value="{{$delivery->startPosition->address}}" required>
                                                            <span class="field-icon"><i class="fa fa-location-arrow" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label" ><strong>Date et heure de prise en charge</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input required type='text' class="datepicker-input gui-input" id='datetimepicker4' name="datetimevalue"
                                                                   placeholder="JJ/MM/AAAA" value=""/>
                                                            <span class="field-icon"><i class="fa fa-calendar" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label"><strong>Lieu de livraison</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input type="text"  name="end_position[address]" id="adresse_input_arrivee" class="gui-input" style="color : black"
                                                                   placeholder="Adresse" value="{{$delivery->endPosition->address}}" required>
                                                            <span class="field-icon"><i class="fa fa-location-arrow" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label" ><strong>Date et heure de livraison</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input required type='text' class="datepicker-input gui-input" id='datetimepicker5' name="datetimeend"
                                                                   placeholder="JJ/MM/AAAA" value=""/>
                                                            <span class="field-icon"><i class="fa fa-calendar" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label" ><strong>Nombre de bagages</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input required type="number" min="1" class="gui-input" id="input_nb_bags" name="nb_bags" value="{{$nb_bags}}"/>
                                                            <span class="field-icon"><i class="fa fa-shopping-bag" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>


                                                <div class="row row-margin">
                                                    <div class="col-md-12 switch-1" style="margin-top: 2px" hidden>


                                                        <label for="checkbox">
                                                            <input id="checkbox-consigne" class="check_boxes optional" name="my-checkbox" type="checkbox">
                                                            Voulez-vous que nous gardions vos bagages quelques heures ? Indiquer une durée :
                                                        </label>
                                                        <span class="js-hide-time">
                                                    <label class="field prepend-icon">
                                                        <input type="time" name="time_consigne" id="time_consigne" class="gui-input"
                                                               placeholder="" value="--:--" min="2:00" max="24:00" step="0:30">
                                                        <span class="field-icon"><i class="fa fa-hourglass"></i></span>
                                                    </label>
                                                </span>
                                                        <div class="js-immediate" hidden>
                                                            <br>
                                                            <strong>Livraison dès que possible</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="promo_code" class="field-label"><strong>Code promotion</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input type="text"  name="promo_code" id="promo_code" class="gui-input js-promo-code" style="color : black">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="checkbox">
                                                            <input id="checkbox-course-retour" class="check_boxes optional" type="checkbox" value="Voulez-vous la course retour" name="has_retour">
                                                            Voulez-vous la course retour
                                                        </label>
                                                    </div>
                                                </div>

                                                <div id="row-date-course-retour" class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="retour-datetimepicker" class="field-label" ><strong>Date et heure de la course retour</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input type='text' class="datepicker-input gui-input" id='retour-datetimepicker' name="date_retour"
                                                                   placeholder="JJ/MM/AAAA" value=""/>
                                                            <span class="field-icon"><i class="fa fa-calendar" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <input type="hidden" value="{{$delivery->id}}" name="delivery_id">
                                                        <div id="js-bags-add" hidden>
                                                        @for($i = 0; $i < $nb_bags; $i++)
                                                            <input type="hidden" name="bagages[1][{{$i}}][name]" value="{{'BAGS ' . $i}}">
                                                            <input type="hidden" name="bagages[1][{{$i}}][descr]" value="">
                                                        @endfor
                                                        </div>
                                                        <div class="form-footer js-finalise" style="text-align: center" hidden>
                                                            <button type="submit" class="btn btn-medium light uppercase btn-primary " hidden>Finaliser ma prise en charge</button>
                                                        </div><!-- end .form-footer section -->
                                                        <div class="form-footer js-unfinalise" style="text-align: center" hidden>
                                                            <strong style="color: orangered" class="js-unfinalise">Veuillez ajouter au moins un bagage pour finaliser.</strong>
                                                        </div>
                                                        {{csrf_field()}}
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection

@section('custom-scripts')
    <script src="{{asset('iblue/js/switches/bootstrap-switch.js')}}"></script>
    <script type="text/javascript">
        var bag_number = "{{sizeof(\App\Bag::where('customer_id', \Illuminate\Support\Facades\Auth::user()->customer->id)->get())}}";
        var bag_ref_number = bag_number;
        var nb_bags = bag_number;
        bag_number++;
        var real_number = 0;
        var departments;
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function ($) {
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
                // On est sur que la lib google maps est load
            $(window).load(function () {
            initAutocomplete();
                add_bag();
            if("{{$nb_bags}}" > 0){
                $('.js-finalise').show();
            }else{
                $('.js-unfinalise').show();
            }

            $('#retour-datetimepicker').datetimepicker({
                locale: 'fr',
                defaultDate: moment()
            });

            $('#datetimepicker4').datetimepicker({
                locale: 'fr',
                defaultDate: moment()
            });
            $('#datetimepicker5').datetimepicker({
                    locale: 'fr',
                    defaultDate: moment().add(2, 'hours')
            });
            $('#datetimepicker4').data("DateTimePicker").minDate(moment().add(2, 'hours'));
            $('#datetimepicker4').data("DateTimePicker").maxDate(moment().add(1, 'years'));
                $('#datetimepicker5').data("DateTimePicker").minDate(moment().add(4, 'hours'));
                $('#datetimepicker5').data("DateTimePicker").maxDate(moment().add(24, 'hours'));

            $('#datetimepicker4').on('dp.change', function(){
                if($('#checkbox-course-retour').is(':checked')){
                    $('#checkbox-course-retour').trigger("click");
                    $('#retour-datetimepicker').val(null);
                }
                $('#datetimepicker5').data("DateTimePicker").minDate(moment($('#datetimepicker4').val(), "DD/MM/YYYY H:m").add(2, 'hours'));
                $('#datetimepicker5').data("DateTimePicker").maxDate(moment($('#datetimepicker4').val(), "DD/MM/YYYY H:m").add(24, 'hours'));
            });
            $('.js-add-bag').on('click', function () {
                nb_bags ++;
                real_number ++;
                id = $(this).attr('id').split('-');

                $('.js-' + id[0]).append('<span class=" js-delete-' + bag_number + ' ">' +
                    '<input type="text" class="gui-input" name="bagages[' + id[0] + '][' + bag_number + '][name]" value="'+ id[1] +' '+ real_number+'" placeholder="nom" style="margin-top: 10px">' +
                    '<input type="text" class="gui-input" name="bagages[' + id[0] + '][' + bag_number + '][descr]" value="" placeholder="description">' +
                    '<a class="btn btn-medium light uppercase js-press-delete btn-error" style="color: #F44336" id='+bag_number+'><i class="fa fa-remove"></i> Ne pas utiliser</a></span>');
                bag_number++;
                $('.js-unfinalise').hide();
                $('.js-finalise').show();
            });

                $('#input_nb_bags').on('change', function() {
                   add_bag();
                });

            function add_bag(){
                nb_bags = $('#input_nb_bags').val();
                console.log(nb_bags);
                div = $('#js-bags-add').html(" ");
                for(let i=0; i<nb_bags; i++){
                    div.append('<span class=" js-delete-' + bag_number + ' ">' +
                        '<input type="text" class="gui-input" name="bagages[' + i + '][' + bag_number + '][name]" value="BAGS '+ i +'" placeholder="nom" style="margin-top: 10px">' +
                        '<input type="text" class="gui-input" name="bagages[' + i + '][' + bag_number + '][descr]" value="" placeholder="description">' +
                        '<a class="btn btn-medium light uppercase js-press-delete btn-error" style="color: #F44336" id='+bag_number+'><i class="fa fa-remove"></i> Ne pas utiliser</a></span>');

                }
            }

            $('#time_consigne').val('02:00');
            $('#checkbox-consigne').on('click', function () {
                if($(this).is(':checked')) {
                    $('.js-hide-time').show();
                    $('.js-immediate').hide();
                    time = $('#time_consigne').val();
                    if (time.split(':')[0] > 2) {

                    } else {
                        $('#time_consigne').val('02:00');
                    }
                } else {
                    $('.js-hide-time').hide();
                    $('.js-immediate').show();
                    $('#time_consigne').val('--:--');
                }
            });

            $('#row-date-course-retour').hide();
            $('#checkbox-course-retour').on('click', function () {
                if($(this).is(':checked')) {
                    $('#retour-datetimepicker').data("DateTimePicker").minDate(moment($('#datetimepicker4').val(), "DD/MM/YYYY H:m").add(2, "hours"));
                    $('#retour-datetimepicker').data("DateTimePicker").maxDate(moment().add(1, 'years'));
                    $('#row-date-course-retour').show();
                } else {
                    $('#row-date-course-retour').hide();
                    $('#retour-datetimepicker').val(null);
                }
            });





            $('#time_consigne').on('change', function () {
                time = $(this).val();
                if (time.split(':')[0] < 2) {
                    $('#time_consigne').val('02:00');
                }
                /* Pour faire des paliers
                 if(time.split(':')[1] > 0 && time.split(':')[1] < 30 ){
                 $('#time_consigne').val(time.split(':')[0]+':00');
                 }*/
            });


            $(document).on('click', '.js-press-delete', function () {
                id = $(this).attr('id');
                if(id > bag_ref_number) real_number --;
                nb_bags --;
                if(nb_bags < 1){
                    $('.js-unfinalise').show();
                    $('.js-finalise').hide();
                }
                $('.js-delete-' + id).remove();
            })

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
                            $('#adresse_input_depart').val('');
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
                        $('#adresse_input_arrivee').val('');
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
            })
        });
    </script>
@endsection