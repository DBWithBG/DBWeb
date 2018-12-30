@extends('customer.layouts.app')

@section('content')
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Adresse email</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li><a href="{{url('/profil')}}">Profil</a></li>
                            <li class="current"><a href="{{url('/modificationEmail')}}">Adresse email</a></li>
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

                                <h3 class="uppercase">Modification de votre adresse email ({{\Illuminate\Support\Facades\Auth::user()->email}})</h3>
                                <p>Une fois votre adresse email modifiée, un mail de confirmation vous sera envoyé afin de procéder à sa vérification.</p>
                                <br/>
                                <br/>

                                <div class="text-box white padding-4">
                                    <div class="smartforms-modal-body">
                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container transparent wrap-full">
                                                <div class="form-body no-padd">
                                                    <form method="post" action="{{url('/updateEmail')}}" id="smart-form">

                                                        {{csrf_field()}}


                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="email" name="email"
                                                                       id="email" class="gui-input"
                                                                       placeholder="Nouvelle adresse email">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-envelope"></i></span>
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
