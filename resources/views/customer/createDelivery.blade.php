@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3">
        <div class="container">
            <div class="row">
                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="{{"register"}}" id="account">
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

                            <!-- end section --><br>
                            <div class="tagline"><span>Enregistrement des bagages</span></div><!-- .tagline -->
                            <div style="padding-top: 20px">
                                <label class="field prepend-icon">
                                    <select class="select-box-2 select">
                                        @foreach(\App\TypeBag::all() as $type_bag)
                                            <option value="{{$type_bag->id}}">{{$type_bag->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" placeholder="Nom du bagage">
                                </label>
                            </div>


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