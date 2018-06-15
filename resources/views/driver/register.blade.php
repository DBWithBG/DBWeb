@extends('driver.layouts.app')

@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../../assets/img/register.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Devenir chauffeur pour Deliverbag</h2>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="info info-horizontal">
                                            <div class="icon icon-rose">
                                                <i class="material-icons">timeline</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Aucune obligation d'horaire</h4>
                                                <p class="description">
                                                    Choississez quand vous voulez vous connecter et commencer les courses.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="info info-horizontal">
                                            <div class="icon icon-primary">
                                                <i class="material-icons">code</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Facilité d'utilisation</h4>
                                                <p class="description">
                                                    En deux cliques prenez une course, transportez le bagage et finaliser la course.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="info info-horizontal">
                                            <div class="icon icon-info">
                                                <i class="material-icons">group</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Multi-courses</h4>
                                                <p class="description">
                                                    A vous d'optimiser et de prendre plusieurs courses à la fois pour encore plus de gains.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mr-auto">
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
                                            <h4 class="mt-3"> Ou plus classiquement : </h4>
                                        </div>
                                        <form class="form" method="POST" action="{{url("register")}}">
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" name="surname" class="form-control" placeholder="Prenom">
                                                </div>
                                            </div>

                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" name="name" class="form-control" placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                                                    </div>
                                                    <input type="text" name="email" class="form-control" placeholder="Email...">
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
                                            <input type="hidden" name="type" value="Driver">
                                            {{csrf_field()}}
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
