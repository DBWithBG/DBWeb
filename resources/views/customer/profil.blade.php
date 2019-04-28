@extends('customer.layouts.app')

@section('content')
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Profil</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="current"><a href="{{url('/profil')}}">Profil</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    @if(!$customer->user->is_confirmed)
<div style="margin-top: 10px" class="container">

    <div class="row">
        <div class="col-md-12 nopadding">
            <div class="alert-box warning">
                        <span class="alert-closebtn"
                              onclick="this.parentElement.style.display='none';">&times;</span>
                <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong>
                &nbsp; Veuillez valider votre adresse email en vous rendant sur le lien que nous vous avons
                envoyé par mail. Si vous n'avez pas reçu ce mail, <a class="text-white"
                                                                     href="{{url('/resendConfirmationEmail')}}"><strong>cliquez ici</strong></a>.
            </div>
        </div>
    </div>
</div>
    @endif

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
                </div>
            @endforeach
        </div>
    @endif

    <section class="sec-padding section-light">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12 col-xs-12">

                    <h3 class="uppercase">Vos informations personnelles</h3>
                    <p>Ici, vous pouvez modifier vos informations personnelles. </p>
                    <br/>
                    <br/>

                    <div class="text-box white padding-4">
                        <div class="smartforms-modal-body">
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container transparent wrap-full">
                                    <div class="form-body no-padd">
                                        <form method="post" action="{{url('/profil')}}"
                                              id="smart-form">

                                            {{csrf_field()}}

                                            <div style="padding-bottom: 0px !important; padding-top: 0px !important;" class="section">
                                                Nom : <label class="field prepend-icon">
                                                    <input required type="text" name="name"
                                                           id="sendername"
                                                           class="gui-input" placeholder="Nom"
                                                           value="{{$customer->name}}"/>
                                                    <span class="field-icon"><i
                                                                class="fa fa-user"></i></span>
                                                </label>
                                            </div><!-- end section -->

                                            <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                 class="section">
                                                Prénom : <label class="field prepend-icon">
                                                    <input required type="text" name="surname"
                                                           id="sendername" class="gui-input"
                                                           placeholder="Prénom"
                                                           value="{{$customer->surname}}">
                                                    <span class="field-icon"><i
                                                                class="fa fa-user"></i></span>
                                                </label>
                                            </div><!-- end section -->

                                            <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                 class="section">
                                                Téléphone : <label class="field prepend-icon">
                                                    <input type="tel" name="phone"
                                                           id="phone" class="gui-input"
                                                           placeholder="Téléphone"
                                                           value="{{$customer->phone}}">
                                                    <span class="field-icon"><i
                                                                class="fa fa-phone"></i></span>
                                                </label>
                                            </div><!-- end section -->


                                            <div class="result"></div><!-- end .result  section -->

                                            <!-- end .form-body section -->
                                            <div class="form-footer text-left">
                                                <button type="submit"
                                                        data-btntext-sending="Sending..."
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
