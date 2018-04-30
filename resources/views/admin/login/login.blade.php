@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-4 col-sm-6 ml-auto mr-auto" style="margin-left: auto;
margin-right: auto; margin-top: 15%">
            <form class="form" method="POST" action="{{url('/login')}}">
                {{ csrf_field() }}

                <div class="card card-login card-hidden">
                    <div class="card-header text-center" >

                        <img src="{{asset('/img/logo.png')}}" style="width: 90%; margin-bottom: 40px; margin-top: 20px">
                    </div>

                    <div class="card-body ">



                        <span class="bmd-form-group has-error">

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">email</i>
                      </span>
                    </div>


                    <input type="email" name="email" id="email" class="form-control" placeholder="" required>
                      @if ($errors->has('email'))
                          <label for="email" class="bmd-label-floating" style="margin-left: 20%; color: #e91e63"><strong>{{ $errors->first('email') }}</strong></label>
                      @else
                          <label for="email" class="bmd-label-floating" style="margin-left: 20%; color: black"><strong>{{ $errors->first('email') }}</strong></label>

                      @endif

                  </div>

                </span>
                        <span class="bmd-form-group">
                  <div class="input-group">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                      @endif
                      <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="" required>
                  </div>
                </span>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button class="btn btn-rose btn-link btn-lg" type="submit">Se connecter</button>
                    </div>
                    <a href="{{url('backoffice/password')}}" style="margin-left: 10px">Mot de passe oublié</a>
                </div>
            </form>
        </div>
    </div>
@endsection
