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
                            <li><a href="{{url('/')}}">{{trans('accespro.accueil')}}</a></li>
                            <li class="current"><a href="{{url('/accespro')}}">Accès professionnel</a></li>
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

                                <h3 class="uppercase">{{trans('accespro.demande')}}</h3>
                                <p>{{trans('accespro.question')}}</p>
                                <br/>
                                <br/>

                                <div class="text-box white padding-4">
                                    <div class="smartforms-modal-body">
                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container transparent wrap-full">
                                                <div class="form-body no-padd">
                                                    <form method="post" action="{{url('/pro/create')}}" id="smart-form">

                                                        {{csrf_field()}}
                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" name="raison_sociale" id="raison_sociale"
                                                                       class="gui-input" placeholder="{{trans('accespro.raison_sociale')}}">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-user"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" name="adresse"
                                                                       id="adresse" class="gui-input"
                                                                       placeholder="{{trans('accespro.adresse')}}">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-location-arrow"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" name="telephone"
                                                                       id="telephone" class="gui-input"
                                                                       placeholder="{{trans('accespro.telephone')}}">
                                                                <span class="field-icon"><i class="fa fa-phone"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" id="siret"
                                                                          name="siret" class="gui-input"
                                                                          placeholder="{{trans('accespro.siret')}}">
                                                                <span class="field-icon"><i class="fa fa-user"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" id="referent"
                                                                          name="referent" class="gui-input"
                                                                          placeholder="{{trans('accespro.referent')}}">
                                                                <span class="field-icon"><i class="fa fa-user"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="email" id="email"
                                                                          name="email" class="gui-input"
                                                                          placeholder="{{trans('accespro.email')}}">
                                                                <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input id="password" required type="password"
                                                                       name="password" class="gui-input"
                                                                       placeholder="{{trans('accespro.password')}}">
                                                                <span class="field-icon"><i class="fa fa-password"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div class="result"></div><!-- end .result  section -->

                                                        <!-- end .form-body section -->
                                                        <div class="form-footer text-left">
                                                            <button type="submit" data-btntext-sending="Sending..."
                                                                    class="button btn-primary">{{trans('accespro.envoyer')}}
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
                                    <h4>{{trans('accespro.adresse')}}</h4>
                                    <h6>DELIVERBAG</h6>
                                    <p>45 avenue de la Liberation, 33110 Le Bouscat</p>
                                    <br/>
                                    <p>{{trans('accespro.tel')}} : + 33 (0)5.57.87.01.11</p>
                                    <p>827 705 476 R.C.S Bordeaux &nbsp;</p>
                                    <p>{{trans('accespro.email')}}: bordeaux@deliverbag.com</p>
                                </div>
                            </div>
                            <!--end item-->


                        </div>
                    </div>
                </section>

@endsection