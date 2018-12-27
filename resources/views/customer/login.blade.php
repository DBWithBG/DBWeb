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

                        <form method="post" action="{{url('/login')}}" id="js-form-login" url="{{url('/login')}}">
                            {{csrf_field()}}

                            <div class="form-body">

                                <div class="spacer-b30">
                                    <div class="tagline"><span>Se connecter avec </span></div><!-- .tagline -->
                                </div>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div style="height: 28px" class="g-signin2" data-onsuccess="onSignIn"></div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div onlogin="checkLoginState();" class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                                        <a href="{{url('/facebook')}}">Facebook</a>
                                    </div>
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
                                <span> Pas encore inscrit ? </span>
                            </div>
                            <div class="row text-center">
                                <a href="{{url('inscription')}}">S'enregistrer</a>
                            </div>
                        </form>

                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <!--end item -->
    <div class="clearfix"></div>
@endsection

@section('custom-scripts')
<script>
    function checkLoginState() {
        console.log('Check login state');
        FB.getLoginStatus(function(response) {
            console.log(response);
        });
    }
</script>
@endsection
