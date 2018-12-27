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
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label"><strong>Lieu de prise en charge</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input type="text" name="start_position[address]" id="firstname"
                                                                   class="gui-input" disabled style="color : black"
                                                                   placeholder="Adresse" value="{{$delivery->startPosition->address}}">
                                                            <span class="field-icon"><i class="fa fa-location-arrow" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label"><strong>Lieu de livraison</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input type="text"  name="end_position[address]" id="firstname" class="gui-input" style="color : black"
                                                                   placeholder="Adresse" value="{{$delivery->endPosition->address}}" disabled>
                                                            <span class="field-icon"><i class="fa fa-location-arrow" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12">
                                                        <label for="email" class="field-label" ><strong>Date et heure de prise en charge</strong></label>
                                                        <label class="field prepend-icon">
                                                            <input type='text' class="datepicker-input gui-input" id='datetimepicker4' name="datetimevalue"
                                                                   placeholder="DD/MM/YYYY" value=""/>
                                                            <span class="field-icon"><i class="fa fa-calendar" style="color : black"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row row-margin">
                                                    <div class="col-md-12 switch-1" style="margin-top: 2px">
                                                        <label for="email" class="field-label">Voulez-vous que nous gardions vos bagages
                                                            quelques heures ? Indiquer une durée :</label>
                                                        <input id="switch-labelText" checked type="checkbox" name="my-checkbox"
                                                               data-off-text="Non" data-on-text="Oui" data-label-text="Consigne">
                                                        <span class="js-hide-time">
                                    <label class="field prepend-icon">
                                        <input type="time" name="time_consigne" id="time_consigne" class="gui-input"
                                               placeholder="" value="2:00" min="2:00" max="24:00" step="0:30">
                                        <span class="field-icon"><i class="fa fa-hourglass"></i></span>
                                    </label>
                                                </span>
                                                        <div class="js-immediate" hidden>
                                                            <strong>Livraison dès que possible</strong>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- end section --><br>
                                                        <div class="text-center">
                                                            <div class="btn-group " role="group">
                                                                <div class="frm-row">
                                                                    <div class="tagline" style="margin-top: 30px; margin-bottom: 20px"><span>Bagages</span></div><!-- .tagline -->


                                                                    @foreach(\App\TypeBag::all() as $type_bag)
                                                                        <div class="col-md-4 js-{{$type_bag->id}}"  style="border-right-color: black;">
                                                                            <span style="font-size: 20px; font-weight: bold">{{$type_bag->name}}<br><span style="font-weight: lighter; !important;">{{$type_bag->length}}x{{$type_bag->width}}x{{$type_bag->height}}cm</span></span>
                                                                            <br>
                                                                            <a id="{{$type_bag->id.'-'.$type_bag->name}}" class="js-add-bag btn btn-small light uppercase btn-success"><i class="fa fa-plus-circle"></i> Ajouter</a>
                                                                            <?php $my_bags = \App\Bag::where('type_id', $type_bag->id)->where('customer_id', \Illuminate\Support\Facades\Auth::user()->customer->id)->get(); ?>
                                                                            @foreach($my_bags as $my_bag)
                                                                                <span class="js-delete-{{$my_bag->id}}">
                                                                                <input type="text" class="gui-input" style="margin-top: 10px"
                                                                                       name="bagages[{{$type_bag->id}}][{{$my_bag->id}}][name]"
                                                                                       value="{{$my_bag->name}}" placeholder="nom">
                                                                                <input type="text" class="gui-input"
                                                                                       name="bagages[{{$type_bag->id}}][{{$my_bag->id}}][descr]"
                                                                                       value="{{$my_bag->details}}" placeholder="description">
                                                                                <a class="btn btn-medium light uppercase js-press-delete btn-error" style="color: #F44336"
                                                                                   id="{{$my_bag->id}}">
                                                                                    <i class="fa fa-remove"></i> Ne pas utiliser</a>
                                                                                    </span>
                                                                        @endforeach
                                                                        <!--end item-->
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <input type="hidden" value="{{$delivery->id}}" name="delivery_id">

                                                        <div class="tagline" style="margin-bottom: 10px"></div>
                                                        <div class="form-footer" style="text-align: center">
                                                            <button type="submit" class="btn btn-medium light uppercase btn-primary">Finaliser ma prise en charge</button>
                                                        </div><!-- end .form-footer section -->

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
        bag_number++;
        var real_number = 0;
        $(document).ready(function ($) {

            $('#datetimepicker4').datetimepicker({
                locale: 'fr',
                defaultDate: moment()
            });
            $('#datetimepicker4').data("DateTimePicker").minDate(moment().add(2, 'hours'));
            $('#datetimepicker4').data("DateTimePicker").maxDate(moment().add(1, 'years'));

            $("[name='my-checkbox']").bootstrapSwitch();
            $('.js-add-bag').on('click', function () {
                real_number ++;
                id = $(this).attr('id').split('-');

                $('.js-' + id[0]).append('<span class=" js-delete-' + bag_number + ' ">' +
                    '<input type="text" class="gui-input" name="bagages[' + id[0] + '][' + bag_number + '][name]" value="'+ id[1] +' '+ real_number+'" placeholder="nom" style="margin-top: 10px">' +
                    '<input type="text" class="gui-input" name="bagages[' + id[0] + '][' + bag_number + '][descr]" value="" placeholder="description">' +
                    '<a class="btn btn-medium light uppercase js-press-delete btn-error" style="color: #F44336" id='+bag_number+'><i class="fa fa-remove"></i> Ne pas utiliser</a></span>');
                bag_number++;
            });
            $('.switch-1').hover(function () {
                if ($('.bootstrap-switch').hasClass('bootstrap-switch-on') == true) {
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
                $('.js-delete-' + id).remove();
            })
        });
    </script>
@endsection