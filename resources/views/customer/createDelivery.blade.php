@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3">
        <div class="container">
            <div class="row">
                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="{{"register"}}" id="account">
                            <div class="form-body">

                                <div class="tagline"><span>Enregistrement des bagages</span></div><!-- .tagline -->
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

                            <div class="">
                                <label for="email" class="field-label">Adresse email</label>
                                <label class="field prepend-icon">
                                    <input type="email" name="email" id="email" class="gui-input"
                                           placeholder="example@domain.com...">
                                    <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                </label>
                            </div><!-- end section -->


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