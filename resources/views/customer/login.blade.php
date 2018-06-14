@extends('driver.layouts.app')

@section('content')
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
                                        <form class="form js-form-login" method="POST" action="{{"login"}}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
