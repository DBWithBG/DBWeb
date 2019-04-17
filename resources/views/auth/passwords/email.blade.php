@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3 " style="background-color: #F5F5F5; padding-top: 5%; padding-bottom: 5%">
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">


                        <form method="POST" action="{{ url("password/email") }}">
                            {{csrf_field()}}

                            <div class="form-body">

                                <div class="spacer-t30 spacer-b30">
                                    <div class="tagline"><span> Mot de passe oublié </span></div><!-- .tagline -->
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
                                    @if (session('status'))
                                        <span class="help-block">
                                        <strong>Un lien vient de vous être envoyé par mail</strong>
                                    @endif
                                </div><!-- end section -->


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
