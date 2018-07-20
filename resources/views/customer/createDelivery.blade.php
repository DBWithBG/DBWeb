@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3">
        <div class="container">
            <div class="row">
                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="{{url("savebags/delivery")}}" id="account">
                            <div class="form-body">

                                <div class="tagline"><span>Vérification des informations</span></div><!-- .tagline -->
                            </div>
                            @if(sizeof($errors->all())>0)
                                <h3 style="color: #bf3924">{{$errors->all()[0]}}</h3>
                            @endif

                            <div>
                                <label for="email" class="field-label">Lieu de prise en charge</label>
                                <label class="field prepend-icon">
                                    <input type="text" name="start_position[address]" id="firstname"
                                           class="gui-input"
                                           placeholder="Adresse" value="{{$delivery->startPosition->address}}">
                                    <span class="field-icon"><i class="fa fa-location-arrow"></i></span>
                                </label>
                            </div>
                            <div>
                                <label for="email" class="field-label">Lieu de livraison</label>
                                <label class="field prepend-icon">
                                    <input type="text" name="end_position[address]" id="firstname" class="gui-input"
                                           placeholder="Adresse" value="{{$delivery->endPosition->address}}">
                                    <span class="field-icon"><i class="fa fa-location-arrow"></i></span>
                                </label>
                            </div>
                            <div class="frm-row">
                                <label for="email" class="field-label">Date et heure de prise en charge</label>
                                <div class="colm colm6">
                                    <label class="field prepend-icon">
                                        <input type="date" name="date_prise_en_charge" id="firstname" class="gui-input"
                                               placeholder="" value="">
                                        <span class="field-icon"><i class="fa fa-calendar"></i></span>
                                    </label>
                                </div><!-- end section -->

                                <div class="colm colm6">
                                    <label class="field prepend-icon">
                                        <input type="time" name="time_prise_en_charge" id="firstname" class="gui-input"
                                               placeholder="" value="">
                                        <span class="field-icon"><i class="fa fa-hourglass"></i></span>
                                    </label>
                                </div><!-- end section -->

                            </div><!-- end frm-row section -->
                            <div class="frm-row">
                                <label for="email" class="field-label">Besoin de stocker vos bagages ?</label>
                                <div class="colm colm6 switch-1">
                                    <input id="switch-labelText" checked type="checkbox" name="my-checkbox"
                                           data-off-text="Non" data-on-text="Oui" data-label-text="Consigne">
                                </div>
                                <div class="colm colm6">
                                    <label class="field prepend-icon">
                                        <input type="time" name="time_consigne" id="time_consigne" class="gui-input"
                                               placeholder="" value="2:00" min="2:00" max="24:00" step="0:30">
                                        <span class="field-icon"><i class="fa fa-hourglass"></i></span>
                                    </label>
                                </div>
                            </div>
                            <!-- end section --><br>
                            <div class="tagline"><span>Enregistrement des bagages</span></div><!-- .tagline -->
                            <div style="padding-top: 10px " class="text-center">
                                <div class="btn-group " role="group">
                                    <div class="frm-row">

                                        @foreach(\App\TypeBag::all() as $type_bag)
                                            <a id="{{$type_bag->id}}" class="js-add-bag button btn-secondary"
                                               href="javascript:void(0)"
                                               style="margin-bottom: 10px">
                                                <i class="fa fa-plus-circle"></i> {{$type_bag->name}}
                                                ({{$type_bag->length}}
                                                x{{$type_bag->width}}x{{$type_bag->height}}cm)
                                            </a>
                                            <div class="js-{{$type_bag->id}}">
                                                <?php $my_bags = \App\Bag::where('type_id', $type_bag->id)->where('customer_id', \Illuminate\Support\Facades\Auth::user()->customer->id)->get(); ?>
                                                @foreach($my_bags as $my_bag)
                                                    <div class="colm colm6 js-delete-{{$my_bag->id}}">
                                                        <input type="text" class="gui-input"
                                                               name="bagages[{{$type_bag->id}}][{{$my_bag->id}}][name]"
                                                               value="{{$my_bag->name}}" placeholder="nom">
                                                        <input type="text" class="gui-input"
                                                               name="bagages[{{$type_bag->id}}][{{$my_bag->id}}][descr]"
                                                               value="{{$my_bag->details}}" placeholder="description">
                                                        <a class="btn btn-small js-press-delete btn-info"
                                                           id="{{$my_bag->id}}">Ne pas utiliser</a>
                                                    </div>
                                                @endforeach
                                            </div>

                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" value="{{$delivery->id}}" name="delivery_id">


                            <div class="form-footer">
                                <button type="submit" class="button btn-primary">Finaliser ma prise en charge</button>
                            </div><!-- end .form-footer section -->

                            {{csrf_field()}}
                        </form>

                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>

@endsection

@section('custom-scripts')
    <script src="{{asset('iblue/js/switches/bootstrap-switch.js')}}"></script>
    <script type="text/javascript">
        var bag_number = "{{sizeof(\App\Bag::where('customer_id', \Illuminate\Support\Facades\Auth::user()->customer->id)->get())}}";
        bag_number++;
        $(document).ready(function ($) {
            $("[name='my-checkbox']").bootstrapSwitch();
            $('.js-add-bag').on('click', function () {
                id = $(this).attr('id');
                $('.js-' + id).append('<div class=" js-delete-' + bag_number + ' colm colm6">' +
                    '<input type="text" class="gui-input" name="bagages[' + id + '][' + bag_number + '][name]" value="" placeholder="nom">' +
                    '<input type="text" class="gui-input" name="bagages[' + id + '][' + bag_number + '][descr]" value="" placeholder="description">' +
                    '<a class="btn btn-small js-press-delete btn-danger" id="' + bag_number + '">Supprimer</a>' +
                    '</div>');
                bag_number++;
            });
            $('.switch-1').hover(function () {
                if ($('.bootstrap-switch').hasClass('bootstrap-switch-on') == true) {
                    time = $('#time_consigne').val();
                    if (time.split(':')[0] > 2) {

                    } else {
                        $('#time_consigne').val('02:00');
                    }
                } else {
                    $('#time_consigne').val('--:--');
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
                $('.js-delete-' + id).remove();
            })
        });
    </script>
@endsection