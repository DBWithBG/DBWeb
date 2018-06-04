@extends('driver.layouts.app')

@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../../assets/img/register.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Connexion/ client deliverbag</h2>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-5 mr-auto text-center">
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
                                        <form class="form" method="POST" action="{{"login"}}">
                                            {{csrf_field()}}
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                                                    </div>
                                                    <input type="email" name="email" class="form-control" placeholder="Email...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" name="password" placeholder="Mot de passe..." class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-round mt-4">Se connecter</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-5 mr-auto text-center">
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
                                            <h4 class="mt-3"> Inscription : </h4>
                                        </div>
                                        <form class="form" method="POST" action="{{"register"}}">
                                            {{csrf_field()}}
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="surname" placeholder="Prenom">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                                                    </div>
                                                    <input type="email" name="email" class="form-control" placeholder="Email...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" name="password" placeholder="Mot de passe..." class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" name="password_confirmation" placeholder="Mot de passe..." class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                                    <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                                                    J'accepte les
                                                    <a href="#something">termes et les conditions</a>.
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-round mt-4">S'inscrire</button>
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

@endsection
