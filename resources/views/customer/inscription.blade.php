@extends('customer.layouts.app')

@section('content')

    <section class="padding-top-3">
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="{{"register"}}" id="account">
                            <div class="form-body">
                                <div class="text-center">
                                    <div class="spacer-b30">
                                        <div class="tagline"><span>S'inscrire avec </span></div><!-- .tagline -->
                                    </div>
                                    <a href="{{url('facebook')}}" class="button btn-social facebook span-left"> <span><i
                                                    class="fa fa-facebook"></i></span> Facebook </a>
                                    <a href="{{url('google')}}" class="button btn-social googleplus span-left"> <span><i
                                                    class="fa fa-google-plus"></i></span> Google+ </a>
                                </div><!-- end section -->
                                <div class="spacer-b30" style="padding-top: 20px">
                                    <div class="tagline"><span>OU Classiquement </span></div><!-- .tagline -->
                                </div>
                                @if(sizeof($errors->all())>0)
                                    <h3 style="color: #bf3924">{{$errors->all()[0]}}</h3>
                                @endif
                                <label for="names" class="field-label">Identité</label>
                                <div class="frm-row">

                                    <div class="colm colm6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="surname" id="firstname" class="gui-input"
                                                   placeholder="Prénom">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                        </label>
                                    </div><!-- end section -->

                                    <div class="colm colm6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="name" id="lastname" class="gui-input"
                                                   placeholder="nom">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                        </label>
                                    </div><!-- end section -->

                                </div><!-- end frm-row section -->

                                <div class="">
                                    <label for="email" class="field-label">Adresse email</label>
                                    <label class="field prepend-icon">
                                        <input type="email" name="email" id="email" class="gui-input"
                                               placeholder="example@domain.com...">
                                        <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                    </label>
                                </div><!-- end section -->

                                <div class="">
                                    <label for="password" class="field-label">Mot de passe</label>
                                    <label class="field prepend-icon">
                                        <input type="password" name="password" id="password" class="gui-input">
                                        <span class="field-icon"><i class="fa fa-lock"></i></span>
                                    </label>
                                </div><!-- end section -->

                                <div class="">
                                    <label for="confirmPassword" class="field-label">Confirmer le mot de passe</label>
                                    <label class="field prepend-icon">
                                        <input type="password" name="password_confirmation" id="confirmPassword"
                                               class="gui-input">
                                        <span class="field-icon"><i class="fa fa-unlock-alt"></i></span>
                                    </label>
                                </div><!-- end section -->


                                <div class="">
                                    <label for="mobile" class="field-label">Numéro de téléphone</label>
                                    <label class="field prepend-icon">
                                        <input type="tel" name="mobile" id="mobile" class="gui-input" placeholder="+33">
                                        <span class="field-icon"><i class="fa fa-phone-square"></i></span>
                                    </label>
                                </div><!-- end section -->

                                <div class="">
                                    <label class="option">
                                        <input type="checkbox" name="check1">
                                        <span class="checkbox"></span>
                                        J'accepte <a href="#" class="smart-link"> les conditions d'utilisation </a>
                                    </label>
                                </div><!-- end section -->

                            </div><!-- end .form-body section -->
                            <div class="form-footer">
                                <button type="submit" class="button btn-primary">Créer mon compte</button>
                                <a href="{{url('connexion')}}">J'ai déjà un compte</a>
                            </div><!-- end .form-footer section -->
                            <input type="hidden" name="type" value="Customer">

                            {{csrf_field()}}
                        </form>

                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>



@endsection
