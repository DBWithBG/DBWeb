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


                                                    <form method="post" action="{{url('/login')}}" id="js-form-login">
                                                        {{csrf_field()}}

                                                        <div class="form-body">

                                                            <div class="spacer-b30">
                                                                <div class="tagline"><span>Se connecter avec </span></div><!-- .tagline -->
                                                            </div>

                                                            <div class="row text-center">
                                                                <a href="{{url('facebook?from_type=web&type=customer')}}"
                                                                   class="button btn-social facebook span-left"> <span><i
                                                                                class="fa fa-facebook"></i></span> Facebook
                                                                </a>
                                                                <a href="{{url('google?from_type=web&type=customer')}}"
                                                                   class="button btn-social googleplus span-left"> <span><i
                                                                                class="fa fa-google"></i></span>
                                                                    Google </a>
                                                            </div>

                                                            <div class="spacer-t30 spacer-b30">
                                                                <div class="tagline"><span> OU classiquement </span></div><!-- .tagline -->
                                                            </div>

                                                            <div class="">
                                                                <label class="field prepend-icon">
                                                                    <input type="text" name="email" id="email" class="gui-input" placeholder="Email">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                            <div class="">
                                                                <label class="field prepend-icon">
                                                                    <input type="password" name="password" id="password" class="gui-input" placeholder="Mot de passe">
                                                                    <span class="field-icon"><i class="fa fa-lock"></i></span>
                                                                </label>
                                                            </div><!-- end section -->
                                                            <br>
                                                            <div class="">
                                                                <label class="switch block">
                                                                    <input type="checkbox" name="remember" id="remember" checked>
                                                                    <span class="switch-label" for="remember" data-on="OUI" data-off="NON"></span>
                                                                    <span> Rester connecté ?</span>
                                                                </label>
                                                            </div><!-- end section -->
                                                        </div><!-- end .form-body section -->
                                                        <div class="form-footer">

                                                            <div class="row text-center">
                                                                <button type="submit" class="button btn-primary">Connexion</button>
                                                            </div>


                                                            <div class="row text-center">
                                                                <a href="{{url('/password/reset')}}">Mot de passe oublié ?</a>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="test">

                                                        <p id="infos"></p>

                                                        <div class="row text-center">
                                                            <span><a href="{{url('inscription')}}"> Pas encore inscrit ? </a></span>
                                                        </div>
                                                        <div class="row text-center">
                                                            <a href="{{url('inscription')}}">S'enregistrer</a>
                                                        </div>
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


                                                    <form method="post" action="{{url('/login')}}" id="js-form-login">
                                                        {{csrf_field()}}

                                                        <div class="form-body">

                                                            <div class="spacer-b30">
                                                                <div class="tagline"><span>Se connecter avec </span></div><!-- .tagline -->
                                                            </div>

                                                            <div class="row text-center">
                                                                <a href="{{url('facebook?from_type=web&type=driver')}}"
                                                                   class="button btn-social facebook span-left"> <span><i
                                                                                class="fa fa-facebook"></i></span> Facebook
                                                                </a>
                                                                <a href="{{url('google?from_type=web&type=driver')}}"
                                                                   class="button btn-social googleplus span-left"> <span><i
                                                                                class="fa fa-google"></i></span>
                                                                    Google </a>
                                                            </div>

                                                            <div class="spacer-t30 spacer-b30">
                                                                <div class="tagline"><span> OU classiquement </span></div><!-- .tagline -->
                                                            </div>

                                                            <div class="">
                                                                <label class="field prepend-icon">
                                                                    <input type="text" name="email" id="email" class="gui-input" placeholder="Email">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                            <div class="">
                                                                <label class="field prepend-icon">
                                                                    <input type="password" name="password" id="password" class="gui-input" placeholder="Mot de passe">
                                                                    <span class="field-icon"><i class="fa fa-lock"></i></span>
                                                                </label>
                                                            </div><!-- end section -->
                                                            <br>
                                                            <div class="">
                                                                <label class="switch block">
                                                                    <input type="checkbox" name="remember" id="remember" checked>
                                                                    <span class="switch-label" for="remember" data-on="OUI" data-off="NON"></span>
                                                                    <span> Rester connecté ?</span>
                                                                </label>
                                                            </div><!-- end section -->
                                                        </div><!-- end .form-body section -->
                                                        <div class="form-footer">

                                                            <div class="row text-center">
                                                                <button type="submit" class="button btn-primary">Connexion</button>
                                                            </div>


                                                            <div class="row text-center">
                                                                <a href="{{url('/password/reset')}}">Mot de passe oublié ?</a>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="test">

                                                        <p id="infos"></p>

                                                        <div class="row text-center">
                                                            <span><a href="{{url('inscription')}}"> Pas encore inscrit ? </a></span>
                                                        </div>
                                                        <div class="row text-center">
                                                            <a href="{{url('inscription')}}">S'enregistrer</a>
                                                        </div>
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