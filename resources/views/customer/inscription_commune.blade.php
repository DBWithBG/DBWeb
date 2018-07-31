@extends('customer.layouts.app')

@section('content')

    <section class="section-light">
        <div class="container">
            <div class="row sec-padding hl-more-top-padd">

                <div class="col-md-12 text-center"><h3 class="uppercase less-mar-1 font-weight-5 raleway">Vous êtes</h3>
                </div>
                <div class="clearfix"></div>
                <br/><br/>

                <div class="col-md-6 col-md-offset-3">
                    <div class="col-md-12 nopadding">
                        <div class="tab-navbar-main center tabstyle-12">
                            <ul style="display: flex; justify-content: center; background-color: transparent !important;"
                                class="responsive-tabs">

                                    <li class="js-customer"><a href="#tab-customer"
                                                               target="_self"><span
                                                    class="fa fa-user"></span> <br/>
                                            Client</a></li>
                                    <li class="js-driver"><a href="#tab-driver" class="click-js-driver"
                                                             target="_self"><span
                                                    class="fa fa-car"></span> <br/>
                                            Chauffeur</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div style="margin-top: 50px; padding: 0" class="tab-content-holder-9">
                        <div class="responsive-tabs-content">
                            <div id="tab-customer" class="responsive-tabs-panel">
                                <div class="col-md-12">
                                    <div class="tabstyle-9-feature-box-2">

                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container wrap-3">
                                                @if($errors->any())
                                                    @foreach($errors->all() as $key => $error)
                                                        @if($error != "")
                                                            <div class="row">
                                                                <div class="col-md-12 nopadding">
                                                                    <div class="alert-box warning">
                                                                    <span class="alert-closebtn"
                                                                          onclick="this.parentElement.style.display='none';">&times;</span>
                                                                        <strong><i class="fa fa-exclamation-triangle"
                                                                                   aria-hidden="true"></i></strong>
                                                                        &nbsp; {{$error}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                <form method="post" action="{{"register"}}" url="{{url('register')}}" id="account">
                                                    <div class="form-body">
                                                        <div class="text-center">
                                                            <div class="spacer-b30">
                                                                <div class="tagline"><span>S'inscrire avec </span></div>
                                                                <!-- .tagline -->
                                                            </div>
                                                            <a href="{{url('facebook')}}"
                                                               class="button btn-social facebook span-left"> <span><i
                                                                            class="fa fa-facebook"></i></span> Facebook
                                                            </a>
                                                            <a href="{{url('google')}}"
                                                               class="button btn-social googleplus span-left"> <span><i
                                                                            class="fa fa-google-plus"></i></span>
                                                                Google+ </a>
                                                        </div><!-- end section -->
                                                        <div class="spacer-b30" style="padding-top: 20px">
                                                            <div class="tagline"><span>OU Classiquement </span></div>
                                                            <!-- .tagline -->
                                                        </div>
                                                        <label for="names" class="field-label">Identité</label>
                                                        <div class="frm-row">

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input type="text" name="surname" id="firstname"
                                                                           class="gui-input"
                                                                           placeholder="Prénom">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input type="text" name="name" id="lastname"
                                                                           class="gui-input"
                                                                           placeholder="Nom">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                        </div><!-- end frm-row section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="email" class="field-label">Adresse email</label>
                                                            <label class="field prepend-icon">
                                                                <input type="email" name="email" id="email"
                                                                       class="gui-input"
                                                                       placeholder="example@domain.com...">
                                                                <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="password" class="field-label">Mot de
                                                                passe</label>
                                                            <label class="field prepend-icon">
                                                                <input type="password" name="password" id="password"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-lock"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="confirmPassword" class="field-label">Confirmer
                                                                le mot de passe</label>
                                                            <label class="field prepend-icon">
                                                                <input type="password" name="password_confirmation"
                                                                       id="confirmPassword"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-unlock-alt"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div style="padding-top: 6px" class="">
                                                            <label for="mobile" class="field-label">Numéro de
                                                                téléphone</label>
                                                            <label class="field prepend-icon">
                                                                <input type="tel" name="mobile" id="mobile"
                                                                       class="gui-input" placeholder="+33">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-phone-square"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label class="option">
                                                                <input type="checkbox" name="cgu">
                                                                <span class="checkbox"></span>
                                                                J'accepte <a href="#" class="smart-link"> les conditions
                                                                    d'utilisation </a>
                                                            </label>
                                                        </div><!-- end section -->

                                                    </div><!-- end .form-body section -->
                                                    <div class="form-footer">
                                                        <button type="submit" class="button btn-primary">Créer mon
                                                            compte
                                                        </button>
                                                        <div class="spacer-t30 spacer-b30">
                                                            <div class="tagline" style="padding-bottom: 15px"><span> J'ai déjà un compte </span>
                                                            </div><!-- .tagline -->
                                                            <a href="{{url('connexion')}}" class="button btn-primary">Se
                                                                connecter</a>
                                                        </div>
                                                    </div><!-- end .form-footer section -->
                                                    <input type="hidden" name="type" value="Customer">
                                                    <input type="hidden" id="test" value="">


                                                    {{csrf_field()}}
                                                </form>

                                            </div><!-- end .smart-forms section -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="tab-driver" class="responsive-tabs-panel">
                                <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom">
                                    <div class="tabstyle-9-feature-box-2">
                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container wrap-3">

                                                @if($errors->any())
                                                    @foreach($errors->all() as $error)
                                                        @if($error != "")
                                                            <div class="row">
                                                                <div class="col-md-12 nopadding">
                                                                    <div class="alert-box warning">
                                                                    <span class="alert-closebtn"
                                                                          onclick="this.parentElement.style.display='none';">&times;</span>
                                                                        <strong><i class="fa fa-exclamation-triangle"
                                                                                   aria-hidden="true"></i></strong>
                                                                        &nbsp; {{$error}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                <form method="post" action="{{"register"}}" id="account" url="{{url('register')}}">
                                                    <div class="form-body">
                                                        <div class="text-center">
                                                            <div class="spacer-b30">
                                                                <div class="tagline"><span>S'inscrire avec </span></div>
                                                                <!-- .tagline -->
                                                            </div>
                                                            <a href="{{url('facebook')}}"
                                                               class="button btn-social facebook span-left"> <span><i
                                                                            class="fa fa-facebook"></i></span> Facebook
                                                            </a>
                                                            <a href="{{url('google')}}"
                                                               class="button btn-social googleplus span-left"> <span><i
                                                                            class="fa fa-google-plus"></i></span>
                                                                Google+ </a>
                                                        </div><!-- end section -->
                                                        <div class="spacer-b30" style="padding-top: 20px">
                                                            <div class="tagline"><span>OU Classiquement </span></div>
                                                            <!-- .tagline -->
                                                        </div>
                                                        <label for="names" class="field-label">Identité</label>
                                                        <div class="frm-row">

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input type="text" name="surname" id="firstname"
                                                                           class="gui-input"
                                                                           placeholder="Prénom">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input type="text" name="name" id="lastname"
                                                                           class="gui-input"
                                                                           placeholder="Nom">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                        </div><!-- end frm-row section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="email" class="field-label">Adresse email</label>
                                                            <label class="field prepend-icon">
                                                                <input type="email" name="email" id="email"
                                                                       class="gui-input"
                                                                       placeholder="example@domain.com...">
                                                                <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="password" class="field-label">Mot de
                                                                passe</label>
                                                            <label class="field prepend-icon">
                                                                <input type="password" name="password" id="password"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-lock"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="confirmPassword" class="field-label">Confirmer
                                                                le mot de passe</label>
                                                            <label class="field prepend-icon">
                                                                <input type="password" name="password_confirmation"
                                                                       id="confirmPassword"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-unlock-alt"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div style="padding-top: 6px" class="">
                                                            <label for="mobile" class="field-label">Numéro de
                                                                téléphone</label>
                                                            <label class="field prepend-icon">
                                                                <input type="tel" name="mobile" id="mobile"
                                                                       class="gui-input" placeholder="+33">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-phone-square"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label class="option">
                                                                <input type="checkbox" name="cgu">
                                                                <span class="checkbox"></span>
                                                                J'accepte <a href="#" class="smart-link"> les conditions
                                                                    d'utilisation </a>
                                                            </label>
                                                        </div><!-- end section -->

                                                    </div><!-- end .form-body section -->
                                                    <div class="form-footer">
                                                        <button type="submit" class="button btn-primary">Créer mon
                                                            compte
                                                        </button>
                                                        <div class="spacer-t30 spacer-b30">
                                                            <div class="tagline" style="padding-bottom: 15px"><span> J'ai déjà un compte </span>
                                                            </div><!-- .tagline -->
                                                            <a href="{{url('connexion')}}" class="button btn-primary">Se
                                                                connecter</a>
                                                        </div>
                                                    </div><!-- end .form-footer section -->
                                                    <input type="hidden" name="type" value="Driver">
                                                    <input type="hidden" id="test" value="">


                                                    {{csrf_field()}}
                                                </form>

                                            </div><!-- end .smart-forms section -->
                                        </div>
                                    </div>
                                </div>
                                <!--end item-->

                            </div>
                            <!--end panel 2-->


                        </div>
                    </div>
                    <!--end column-->

                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <?php
        if(session('inscription_driver')){
            $tmp=1;
            session()->forget('inscription_driver');
        }else{
            $tmp=0;
        }

    ?>
    <script type="text/javascript">

        $(document).ready(function ($) {
           if("{{$tmp}}"=="1"){
               $('.js-customer').removeClass("active");
               $('.js-driver').addClass("active");
               $("#tab-customer").hide();
               $("#tab-driver").toggle();

           }
        });
    </script>

@endsection
