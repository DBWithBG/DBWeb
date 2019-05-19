@extends('customer.layouts.app')

@section('content')

    <section class="section-light">
        <div class="container">
            <div class="row sec-padding hl-more-top-padd">

                <div class="col-md-12 text-center"><h3 class="uppercase less-mar-1 font-weight-5 raleway">{{trans('inscription.vous')}}</h3>
                </div>
                <div class="clearfix"></div>
                <br/><br/>

                <div class="col-md-6 col-md-offset-3">
                    <div class="col-md-12 nopadding">
                        <div class="tab-navbar-main center tabstyle-12">
                            <ul style="display: flex; justify-content: center; background-color: transparent !important;"
                                class="responsive-tabs">

                                    <li class="js-customer"><a href="#tab-customer"
                                                               target="_self"><span
                                                    class="fa fa-user"></span> <br/>
                                            {{trans('inscription.client')}}</a></li>
                                    <li class="js-driver"><a href="#tab-driver" class="click-js-driver"
                                                             target="_self"><span
                                                    class="fa fa-car"></span> <br/>
                                            {{trans('inscription.chauffeur')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div style="margin-top: 50px; padding: 0" class="tab-content-holder-9">
                        <div class="responsive-tabs-content">
                            <div id="tab-customer" class="responsive-tabs-panel">
                                <div class="col-md-12">
                                    <div class="tabstyle-9-feature-box-2">

                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container wrap-3">
                                                @if($errors->any())
                                                    @foreach($errors->all() as $key => $error)
                                                        @if($error != "")
                                                            <div class="row">
                                                                <div class="col-md-12 nopadding">
                                                                    <div class="alert-box warning">
                                                                    <span class="alert-closebtn"
                                                                          onclick="this.parentElement.style.display='none';">&times;</span>
                                                                        <strong><i class="fa fa-exclamation-triangle"
                                                                                   aria-hidden="true"></i></strong>
                                                                        &nbsp; {{$error}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                <form method="post" action="{{"register"}}" id="account1">
                                                    <div class="form-body">
                                                        <div class="text-center">
                                                            <div class="spacer-b30">
                                                                <div class="tagline"><span>{{trans('inscription.signin')}}</span></div>
                                                                <!-- .tagline -->
                                                            </div>
                                                            <a href="{{url('facebook?from_type=web&type=customer')}}"
                                                               class="button btn-social facebook span-left"> <span><i
                                                                            class="fa fa-facebook"></i></span> Facebook
                                                            </a>
                                                            <a href="{{url('google?from_type=web&type=customer')}}"
                                                               class="button btn-social googleplus span-left"> <span><i
                                                                            class="fa fa-google"></i></span>
                                                                Google </a>
                                                        </div><!-- end section -->
                                                        <div class="spacer-b30" style="padding-top: 20px">
                                                            <div class="tagline"><span>{{trans('inscription.ou')}}</span></div>
                                                            <!-- .tagline -->
                                                        </div>
                                                        <label for="names" class="field-label">{{trans('inscription.idClient')}}</label>
                                                        <div class="frm-row">

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input required type="text" name="surname" id="firstname"
                                                                           class="gui-input"
                                                                           placeholder="{{trans('inscription.prenom')}}">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input required type="text" name="name" id="lastname"
                                                                           class="gui-input"
                                                                           placeholder="{{trans('inscription.nom')}}">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                        </div><!-- end frm-row section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="email" class="field-label">{{trans('inscription.email')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="email" name="email" id="email"
                                                                       class="gui-input"
                                                                       placeholder="example@domain.com...">
                                                                <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="password" class="field-label">{{trans('inscription.mdp')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="password" name="password" id="password"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-lock"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="confirmPassword" class="field-label">{{trans('inscription.confmdp')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="password" name="password_confirmation"
                                                                       id="confirmPassword"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-unlock-alt"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div style="padding-top: 6px" class="">
                                                            <label for="mobile" class="field-label">{{trans('inscription.tel')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="tel" name="phone" id="mobile"
                                                                       class="gui-input" placeholder="+33">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-phone-square"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label class="option">
                                                                <input type="checkbox" name="cgu">
                                                                <span class="checkbox"></span>
                                                                <a href="#" class="smart-link">{{trans('inscription.cgu')}}</a>
                                                            </label>
                                                        </div><!-- end section -->

                                                    </div><!-- end .form-body section -->
                                                    <div class="form-footer">
                                                        <button type="submit" class="button btn-primary">{{trans('inscription.create')}}
                                                        </button>
                                                        <div class="spacer-t30 spacer-b30">
                                                            <div class="tagline" style="padding-bottom: 15px"><span>{{trans('inscription.already')}}</span>
                                                            </div><!-- .tagline -->
                                                            <a href="{{url('connexion')}}" class="button btn-primary">{{trans('inscription.connexion')}}</a>
                                                        </div>
                                                    </div><!-- end .form-footer section -->
                                                    <input type="hidden" name="type" value="Customer">


                                                    {{csrf_field()}}
                                                </form>

                                            </div><!-- end .smart-forms section -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="tab-driver" class="responsive-tabs-panel">
                                <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom">
                                    <div class="tabstyle-9-feature-box-2">
                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container wrap-3">

                                                @if($errors->any())
                                                    @foreach($errors->all() as $error)
                                                        @if($error != "")
                                                            <div class="row">
                                                                <div class="col-md-12 nopadding">
                                                                    <div class="alert-box warning">
                                                                    <span class="alert-closebtn"
                                                                          onclick="this.parentElement.style.display='none';">&times;</span>
                                                                        <strong><i class="fa fa-exclamation-triangle"
                                                                                   aria-hidden="true"></i></strong>
                                                                        &nbsp; {{$error}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                <form method="post" action="{{"register"}}" id="account2">
                                                    <div class="form-body">
                                                        <div class="text-center">
                                                            <div class="spacer-b30">
                                                                <div class="tagline"><span>{{trans('inscription.signin')}} </span></div>
                                                                <!-- .tagline -->
                                                            </div>
                                                            <a href="{{url('facebook?from_type=web&type=driver')}}"
                                                               class="button btn-social facebook span-left"> <span><i
                                                                            class="fa fa-facebook"></i></span> Facebook
                                                            </a>
                                                            <a href="{{url('google?from_type=web&type=driver')}}"
                                                               class="button btn-social googleplus span-left"> <span><i
                                                                            class="fa fa-google"></i></span>
                                                                Google </a>
                                                        </div><!-- end section -->
                                                        <div class="spacer-b30" style="padding-top: 20px">
                                                            <div class="tagline"><span>{{trans('inscription.ou')}} </span></div>
                                                            <!-- .tagline -->
                                                        </div>
                                                        <label for="names" class="field-label">{{trans('inscription.identite')}}</label>
                                                        <div class="frm-row">

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input required type="text" name="surname" id="firstname"
                                                                           class="gui-input"
                                                                           placeholder="{{trans('inscription.prenom')}}">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                            <div class="colm colm6">
                                                                <label class="field prepend-icon">
                                                                    <input required type="text" name="name" id="lastname"
                                                                           class="gui-input"
                                                                           placeholder="{{trans('inscription.nom')}}">
                                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                                </label>
                                                            </div><!-- end section -->

                                                        </div><!-- end frm-row section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="email" class="field-label"{{trans('inscription.email')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="email" name="email" id="email"
                                                                       class="gui-input"
                                                                       placeholder="example@domain.com...">
                                                                <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="password" class="field-label">{{trans('inscription.mdp')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="password" name="password" id="password"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-lock"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label for="confirmPassword" class="field-label">{{trans('inscription.confmdp')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="password" name="password_confirmation"
                                                                       id="confirmPassword"
                                                                       class="gui-input">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-unlock-alt"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div style="padding-top: 6px" class="">
                                                            <label for="mobile" class="field-label">{{trans('inscription.tel')}}</label>
                                                            <label class="field prepend-icon">
                                                                <input required type="tel" name="phone" id="mobile"
                                                                       class="gui-input" placeholder="+33">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-phone-square"></i></span>
                                                            </label>
                                                        </div><!-- end section -->

                                                        <div style="padding-top: 6px" class="">
                                                            <label class="option">
                                                                <input type="checkbox" name="cgu">
                                                                <span class="checkbox"></span>
                                                                <a href="#" class="smart-link"> {{trans('inscription.cgu')}}</a>
                                                            </label>
                                                        </div><!-- end section -->

                                                    </div><!-- end .form-body section -->
                                                    <div class="form-footer">
                                                        <button type="submit" class="button btn-primary">{{trans('inscription.create')}}
                                                        </button>
                                                        <div class="spacer-t30 spacer-b30">
                                                            <div class="tagline" style="padding-bottom: 15px"><span> {{trans('inscription.already')}} </span>
                                                            </div><!-- .tagline -->
                                                            <a href="{{url('connexion')}}" class="button btn-primary">{{trans('inscription.connexion')}}</a>
                                                        </div>
                                                    </div><!-- end .form-footer section -->
                                                    <input type="hidden" name="type" value="Driver">
                                                    <input type="hidden" id="test" value="">


                                                    {{csrf_field()}}
                                                </form>

                                            </div><!-- end .smart-forms section -->
                                        </div>
                                    </div>
                                </div>
                                <!--end item-->

                            </div>
                            <!--end panel 2-->


                        </div>
                    </div>
                    <!--end column-->

                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <?php
        if(session('inscription_driver')){
            $tmp=1;
            session()->forget('inscription_driver');
        }else{
            $tmp=0;
        }

    ?>
    <script type="text/javascript">

        $(document).ready(function ($) {
           if("{{$tmp}}"=="1"){
               $('.js-customer').removeClass("active");
               $('.js-driver').addClass("active");
               $("#tab-customer").hide();
               $("#tab-driver").toggle();

           }
        });
    </script>

@endsection
