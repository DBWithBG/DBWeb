@extends('customer.layouts.app')

@section('content')

    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Contact</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="current"><a href="{{url('/contact')}}">Contact</a></li>
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

                                <h3 class="uppercase">Demander un accès professionnel</h3>
                                <p>Pour toute question, n'hésitez pas à nous contacter via ce formulaire. Nous vous
                                    répondrons dans les plus brefs délais.</p>
                                <br/>
                                <br/>

                                <div class="text-box white padding-4">
                                    <div class="smartforms-modal-body">
                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container transparent wrap-full">
                                                <div class="form-body no-padd">
                                                    <form method="post" action="{{url('/contact')}}" id="smart-form">

                                                        {{csrf_field()}}

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" name="name" id="sendername"
                                                                       class="gui-input" placeholder="Nom">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-user"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" name="surname"
                                                                       id="sendername" class="gui-input"
                                                                       placeholder="Prénom">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-user"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="email" name="email"
                                                                       id="emailaddress" class="gui-input"
                                                                       placeholder="Adresse mail">
                                                                <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="sendermessage"
                                                                          name="message"
                                                                          placeholder="Votre message"></textarea>
                                                                <span class="field-icon"><i class="fa fa-comments"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div class="result"></div><!-- end .result  section -->

                                                        <!-- end .form-body section -->
                                                        <div class="form-footer text-left">
                                                            <button type="submit" data-btntext-sending="Sending..."
                                                                    class="button btn-primary">Envoyer
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


                            <div class="col-md-4 col-sm-12 col-xs-12 text-left">
                                <div style="padding-top: 10px">
                                    <h4>Adresse</h4>
                                    <h6>DELIVERBAG</h6>
                                    <p>45 avenue de la Liberation, 33110 Le Bouscat</p>
                                    <br/>
                                    <p>T&eacute;l : + 33 (0)5.57.87.01.11</p>
                                    <p>827 705 476 R.C.S Bordeaux &nbsp;</p>
                                    <p>E-mail: bordeaux@deliverbag.fr</p>
                                </div>
                            </div>
                            <!--end item-->


                        </div>
                    </div>
                </section>

@endsection