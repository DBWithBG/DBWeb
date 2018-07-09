@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3" >
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="row" style="padding-top: 20px">
                                    <div class="col-md-12 nopadding">
                                        <div class="alert-box warning">
                                            <span class="alert-closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                            <strong><i class="fa fa-exclamation-triangle"aria-hidden="true"></i></strong>
                                            &nbsp; {{$error}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <form method="post" action="{{url('/login')}}" id="js-form-login">
                            {{csrf_field()}}

                            <div class="form-body">

                                <div class="spacer-b30">
                                    <div class="tagline"><span>Se connecter avec </span></div><!-- .tagline -->
                                </div>

                                <div class="text-center">
                                    <a href="{{url('facebook')}}" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                                    <a href="{{url('google')}}" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>

                                </div><!-- end section -->

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

                                <button type="submit" class="button btn-primary">Connexion</button>

                                <a href="{{url('/password/reset')}}">Mot de passe oublié ?</a>
                            </div><!-- end .form-footer section -->
                            <input type="hidden" id="test">

                            <p id="infos"></p>
                        </form>
                        <div class="spacer-t30 spacer-b30">
                            <div class="tagline"><span> Pas encore inscrit ? </span></div><!-- .tagline -->
                        </div>
                        <h4 class="" style="margin-left: 20px"><a href="{{Request::is('/driver/login') ? url('inscription') : url('/drivers/register')}}" class="button btn-primary"><span>S'enregistrer</span></a></h4>

                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <!--end item -->
    <div class="clearfix"></div>
@endsection
