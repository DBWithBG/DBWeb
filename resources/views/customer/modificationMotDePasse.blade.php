@extends('customer.layouts.app')

@section('content')
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Mot de passe</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li><a href="{{url('/profil')}}">Profil</a></li>
                            <li class="current"><a href="{{url('/modificationMotDePasse')}}">Mot de passe</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    @if($errors->any())
        <div style="margin-top: 10px" class="container">
            @foreach($errors->all() as $error)
                <div class="row">

                    <div class="col-md-12 nopadding">
                        <div class="alert-box danger">
                                <span class="alert-closebtn"
                                      onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong>
                            &nbsp; {{$error}}
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif


                <section class="sec-padding section-light">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-8 col-sm-12 col-xs-12">

                                <h3 class="uppercase">Modification de votre mot de passe</h3>
                                <p>Choisissez un mot de passe fort, si possible avec des lettres majuscules, minuscules ainsi que des caractères spéciaux.</p>
                                <br/>
                                <br/>

                                <div class="text-box white padding-4">
                                    <div class="smartforms-modal-body">
                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container transparent wrap-full">
                                                <div class="form-body no-padd">
                                                    <form method="post" action="{{url('/updatePassword')}}" id="smart-form">

                                                        {{csrf_field()}}


                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="password" name="current_password"
                                                                       id="current_password" class="gui-input"
                                                                       placeholder="Mot de passe actuelle">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-lock"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="password" name="new_password"
                                                                       id="new_password" class="gui-input"
                                                                       placeholder="Nouveau mot de passe">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-lock"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="password" name="new_password_again"
                                                                       id="new_password_again" class="gui-input"
                                                                       placeholder="Répéter nouveau mot de passe">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-lock"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div class="result"></div><!-- end .result  section -->

                                                        <!-- end .form-body section -->
                                                        <div class="form-footer text-left">
                                                            <button type="submit" data-btntext-sending="Sending..."
                                                                    class="button btn-primary">Modifier
                                                            </button>
                                                        </div><!-- end .form-footer section -->
                                                    </form>
                                                </div><!-- end .form-body section -->
                                            </div><!-- end .smart-forms section -->
                                        </div><!-- end .smart-wrap section -->
                                    </div>
                                </div><!-- end .smart-wrap section -->
                                <!-- end .smart-forms section -->
                            </div>
                            <!--end item-->


                        @include('customer.layouts.profilRightMenu')
                        <!--end right col-->


                        </div>
                    </div>
                </section>

@endsection
