@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3">
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">


                        <form class="form-horizontal" method="POST" action="{{ url('/password/reset') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-body">

                                <div class="spacer-t30 spacer-b30">
                                    <div class="tagline"><span> Réinitialisation du mot de passe </span></div><!-- .tagline -->
                                </div>

                                <div class="">
                                    <label class="field prepend-icon">
                                        <input type="text" name="email" id="email" class="gui-input"
                                               placeholder="Email">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>
                                    </label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>Adresse mail non valide</strong>
                                    </span>
                                    @endif
                                </div><!-- end section -->
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input type="password" name="password" id="password" class="gui-input" placeholder="Mot de passe">
                                        <span class="field-icon"><i class="fa fa-lock"></i></span>
                                    </label>
                                    @if ($errors->has('password') && strpos($errors->first('password'), 'confirmation') != false)
                                        <span class="help-block">
                                        <strong>Les mots de passe ne correspondent pas</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input type="password" name="password_confirmation" id="password-confirm" class="gui-input" placeholder="Confirmation du mot de passe">
                                        <span class="field-icon"><i class="fa fa-lock"></i></span>
                                    </label>
                                </div>

                                @if (session('status'))
                                    <span class="help-block">
                                        <strong>{{session('status')}}</strong>
                                @endif


                            </div><!-- end .form-body section -->
                            <div class="form-footer">

                                <button type="submit" class="button btn-primary">Réinitialiser</button>


                            </div><!-- end .form-footer section -->
                            <input type="hidden" id="test">

                            <p id="infos"></p>
                        </form>


                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <!--end item -->
    <div class="clearfix"></div>
@endsection
