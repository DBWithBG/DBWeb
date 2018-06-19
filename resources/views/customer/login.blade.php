@extends('customer.layouts.app')

@section('content')
    <section class="sec-padding">
        <div class="container">
            <div class="row">


                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="/" id="contact">
                            <div class="form-body">

                                <div class="spacer-b30">
                                    <div class="tagline"><span>Sign in  With </span></div><!-- .tagline -->
                                </div>

                                <div class="section">
                                    <a href="#" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                                    <a href="#" class="button btn-social twitter span-left">  <span><i class="fa fa-twitter"></i></span> Twitter </a>
                                    <a href="#" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
                                </div><!-- end section -->

                                <div class="spacer-t30 spacer-b30">
                                    <div class="tagline"><span> OR  Login </span></div><!-- .tagline -->
                                </div>

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>
                                    </label>
                                </div><!-- end section -->

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="password" id="password" class="gui-input" placeholder="Enter password">
                                        <span class="field-icon"><i class="fa fa-lock"></i></span>
                                    </label>
                                </div><!-- end section -->

                                <div class="section">
                                    <label class="switch block">
                                        <input type="checkbox" name="remember" id="remember" checked>
                                        <span class="switch-label" for="remember" data-on="YES" data-off="NO"></span>
                                        <span> Keep me logged in ?</span>
                                    </label>
                                </div><!-- end section -->

                            </div><!-- end .form-body section -->
                            <div class="form-footer">
                                <button type="submit" class="button btn-primary">Sign in</button>
                            </div><!-- end .form-footer section -->
                        </form>

                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <!--end item -->
    <div class="clearfix"></div>

    <div class="wrapper wrapper-full-page">
        <div class="page-header register-page header-filter" filter-color="black"
             style="background-image: url('../../assets/img/register.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Inscription client deliverbag</h2>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-12 mr-auto text-center">
                                        <div class="social text-center">
                                            <a class="btn btn-just-icon btn-round btn-google"
                                               href="{{ url('/google') }}">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a class="btn btn-just-icon btn-round btn-facebook"
                                               href="{{ url('/facebook') }}">
                                                <i class="fa fa-facebook"> </i>
                                            </a>
                                            <h4 class="mt-3"> Inscription classique : </h4>
                                        </div>
                                        @if(sizeof($errors->all())>0)
                                            <h3 style="color: #bf3924">{{$errors->all()[0]}}</h3>
                                        @endif
                                        <form class="form" method="POST" action="{{"register"}}">
                                            {{csrf_field()}}
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="surname"
                                                           placeholder="Prenom">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name"
                                                           placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                                                    </div>
                                                    <input type="email" name="email" class="form-control"
                                                           placeholder="Email...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" name="password" placeholder="Mot de passe..."
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" name="password_confirmation"
                                                           placeholder="Mot de passe répété..." class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           checked="0">
                                                    <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                                                    J'accepte les
                                                    <a href="#something">termes et les conditions</a>.
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-round mt-4">
                                                    S'inscrire
                                                </button>
                                            </div>
                                            <input type="hidden" name="type" value="Customer">
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
    <div class="wrapper wrapper-full-page">
        <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../../assets/img/register.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Connexion client deliverbag</h2>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-6 mr-auto text-center" style="margin-left: 25%">
                                        <div class="social text-center">
                                            <a class="btn btn-just-icon btn-round btn-twitter" href="{{ url('/twitter') }}">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a class="btn btn-just-icon btn-round btn-google" href="{{ url('/google') }}">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a class="btn btn-just-icon btn-round btn-facebook" href="{{ url('/facebook') }}">
                                                <i class="fa fa-facebook"> </i>
                                            </a>
                                            <h4 class="mt-3"> Connexion : </h4>
                                        </div>
                                        <form class="form" id="js-form-login" name="js-form-login" method="POST" action="{{"login"}}">
                                            <input type="hidden" id="test" value="">
                                            {{csrf_field()}}
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                                                    </div>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" id="password" name="password" placeholder="Mot de passe..." class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-round mt-4">Se connecter</button>
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

@endsection
