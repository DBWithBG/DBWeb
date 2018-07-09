@extends('customer.layouts.app')

@section('content')

    <!-- START REVOLUTION SLIDER 5.0 -->
    <div class="slide-tmargin">
        <div class="slidermaxwidth">
            <div class="rev_slider_wrapper">
                <!-- START REVOLUTION SLIDER 5.0 auto mode -->
                <div id="rev_slider" class="rev_slider" data-version="5.0">
                    <ul>


                        <!-- SLIDE  -->
                        <li data-index="rs-1" data-transition="">

                            <!-- MAIN IMAGE -->
                            <img src="{{asset('img/banner.jpg')}}" alt="" width="1920" height="1280">

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption raleway white uppercase text-white tp-resizeme"
                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['270','240','240','200']"
                                 data-fontsize="['16','16','14','14']"
                                 data-lineheight="['70','70','70','50']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:0px;"
                                 data-mask_out="x:inherit;y:inherit;"
                                 data-start="2000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap;">
                            </div>

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption montserrat fweight-6 text-white tp-resizeme"
                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['320','100','100','110']"
                                 data-fontsize="['70','70','50','30']"
                                 data-lineheight="['100','100','100','50']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:0px;"
                                 data-mask_out="x:inherit;y:inherit;"
                                 data-start="1000"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap;">Vos bagages Notre mission
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption montserrat fweight-6 text-white tp-resizeme"
                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['390','150','150','150']"
                                 data-fontsize="['70','60','50','30']"
                                 data-lineheight="['100','100','100','50']"
                                 data-width="none"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:0px;"
                                 data-mask_out="x:inherit;y:inherit;"
                                 data-start="1500"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 style="z-index: 7; white-space: nowrap;">Deliverbag
                            </div>

                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption sbut2 btn-round"
                                 data-x="['center','center','center','center']"
                                 data-hoffset="['0','0','0','0']"
                                 data-y="['top','top','top','top']" data-voffset="['460','350','370','300']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                                            <div class="row js-opa" style="opacity: 0.80;">

                                                <div class="smart-wrap">
                                                    <div style="border-radius: 2px"
                                                         class="smart-forms smart-container wrap-3">


                                                        <form method="POST" action="#">
                                                            {{csrf_field()}}

                                                            <div class="form-body">
                                                                <div class="">
                                                                    <label class="field prepend-icon">
                                                                        <input id="adresse_input_depart" type="search"
                                                                               class="gui-input"
                                                                               placeholder="Lieu de prise en charge">
                                                                        <span class="field-icon"><i
                                                                                    class="fa fa-arrow-right"></i></span>
                                                                    </label>
                                                                </div>
                                                                <div class="">
                                                                    <label class="field prepend-icon">
                                                                        <input id="adresse_input_arrivee" type="search"
                                                                               class="gui-input"
                                                                               placeholder="Lieu de livraison">
                                                                        <span class="field-icon"><i
                                                                                    class="fa fa-arrow-left"></i></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-footer">
                                                                <label class="js_valid_deliver button btn-primary">
                                                                    Valider
                                                                </label>
                                                                <label data-toggle="modal"
                                                                        data-target="#trainModal"
                                                                        class="button btn-primary"><i
                                                                            class="fa fa-train"></i></label>
                                                                <label data-toggle="modal"
                                                                        data-target="#planeModal"
                                                                        class="button btn-primary"><i
                                                                            class="fa fa-plane"></i></label>
                                                            </div>
                                                            <p id="infos"></p>
                                                        </form>


                                                    </div><!-- end .smart-forms section -->
                                                </div><!-- end .smart-wrap section -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- LAYER NR. 3 -->

                        </li>
                    </ul>
                </div>
                <!-- END REVOLUTION SLIDER -->
            </div>
        </div>
        <!-- END REVOLUTION SLIDER WRAPPER -->
    </div>
    <div class="clearfix"></div>
    <!-- END OF SLIDER WRAPPER -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" ce-feature-box-37">
                        <div class="col-md-4">
                            <div class="text-box text-center">
                                <div class="icon-plain-medium center white icon"><span class="pe-7s-monitor"></span>
                                </div>
                                <br/>
                                <h5 class="title font-weight-5 text-white">Fully Responsive</h5>
                                <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                    faucibus orci luctus ultrices posuere cubilia Curae.</p>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="text-box text-center">
                                <div class="icon-plain-medium center white icon"><span
                                            class="pe-7s-photo-gallery"></span></div>
                                <br/>
                                <h5 class="title font-weight-5 text-white">A votre écoute</h5>
                                <p class="text-white opacity-8">Pour toutes vos questions, n'hésitez pas à nous contacter, nous vous répondrons dans les plus bref délais.</p>
                                <a class="text-center text-white opacity-8" href="{{url('/contact')}}">Nous contacter</a>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="text-box no-border text-center">
                                <div class="icon-plain-medium center white icon"><span class="pe-7s-lock"></span></div>
                                <br/>
                                <h5 class="title font-weight-5 text-white">Secure Services</h5>
                                <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                    faucibus orci luctus ultrices posuere cubilia Curae.</p>
                            </div>
                        </div>
                        <!--end item-->
                    </div>
                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->
    <section class="sec-tpadding-2 section-light section-pattren-37">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 margin-bottom">
                    <div class="ce-feature-box-30"><img src="http://via.placeholder.com/1000x1060" alt="" /></div>
                </div>
                <!--end item-->

                <div class="col-md-6 margin-bottom">
                    <div class="ce-feature-box-29">
                        <div class="col-sm-12">
                            <div class="sec-title-container less-padding-4 text-left">
                                <h2 class="font-weight-6 less-mar-1 text-white line-height-5">We offer high Quality Home Pages for You</h2>
                                <h6 class="raleway opacity-8 align-left text-white">Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus .</h6>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--end title-->

                        <div class="col-md-6">
                            <div class="ce-feature-box-32 text-left">
                                <div class="icon-plain-msmall left white icon center"><span class="pe-7s-mouse"></span></div>
                                <div class=" text-box text-left">
                                    <h5 class="title font-weight-5 text-white">Beautiful Graphics</h5>
                                    <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit faucibus orci luctus.</p>
                                </div>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-6">
                            <div class="ce-feature-box-32 text-left">
                                <div class="icon-plain-msmall left white icon center"><span class="pe-7s-look"></span></div>
                                <div class=" text-box text-left">
                                    <h5 class="title font-weight-5 text-white">Classic Styles</h5>
                                    <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit faucibus orci luctus.</p>
                                </div>
                            </div>
                        </div>
                        <!--end item-->

                    </div>
                    <!--end item-->
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->
    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 padding-left-4">
                    <div class="col-md-6">
                        <div class="ce-feature-box-15 text-left">
                            <div class="icon-plain-medium left dark icon"><i class="pe-7s-lock"></i></div>
                            <div class="text-box-right">
                                <h5 class="title font-weight-5">Fully Secure and clean</h5>
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
                                <div class="clearfix"></div>
                                <br/>
                                <div class="divider-line solid light-2"></div>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-6">
                        <div class="ce-feature-box-15 text-left">
                            <div class="icon-plain-medium left dark icon"><i class="pe-7s-monitor"></i></div>
                            <div class="text-box-right">
                                <h5 class="title font-weight-5">Fully Responsive Design</h5>
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
                                <div class="clearfix"></div>
                                <br/>
                                <div class="divider-line solid light-2"></div>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="clearfix"></div>
                    <div class="col-divider-margin-4"></div>
                    <div class="col-md-6">
                        <div class="ce-feature-box-15 text-left">
                            <div class="icon-plain-medium left dark icon"><i class="pe-7s-camera"></i></div>
                            <div class="text-box-right">
                                <h5 class="title font-weight-5">Photography & Branding</h5>
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-6">
                        <div class="ce-feature-box-15 text-left">
                            <div class="icon-plain-medium left dark icon"><i class="pe-7s-mouse"></i></div>
                            <div class="text-box-right">
                                <h5 class="title font-weight-5">Excellent Customer Support</h5>
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <section class="sec-padding section-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec-title-container text-center">
                        <h5 class="font-weight-4 less-mar-1 line-height-4 montserrat opacity-9">We are creating beautiful Products</h5>
                        <h2 class="font-weight-6 less-mar-1 montserrat line-height-5">Beautifully Crafted Products<br/>
                            and multipage Templates</h2>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--end title-->

                <div id="js-filters-mosaic-flat" class="cbp-l-filters-buttonCenter round">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All
                        <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".print" class="cbp-filter-item"> Print
                        <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".web-design" class="cbp-filter-item"> Web Design
                        <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".graphic" class="cbp-filter-item"> Graphic
                        <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".motion" class="cbp-filter-item"> Motion
                        <div class="cbp-filter-counter"></div>
                    </div>
                </div>
                <div>
                    <div id="js-grid-mosaic-flat" class="cbp cbp-l-grid-mosaic-flat">
                        <div class="cbp-item web-design graphic"> <a href="http://via.placeholder.com/300x300" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"> <img src="http://via.placeholder.com/300x300" alt=""> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                        <div class="cbp-item print motion"> <a href="http://via.placeholder.com/300x300" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"> <img src="http://via.placeholder.com/300x300" alt=""> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                        <div class="cbp-item print motion"> <a href="http://via.placeholder.com/300x300" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"> <img src="http://via.placeholder.com/300x300" alt=""> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                        <div class="cbp-item motion graphic"> <a href="http://via.placeholder.com/300x300" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"> <img src="http://via.placeholder.com/300x300" alt=""> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                        <div class="cbp-item web-design print"> <a href="http://via.placeholder.com/300x300" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"> <img src="http://via.placeholder.com/300x300" alt=""> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                        <div class="cbp-item print motion"> <a href="http://via.placeholder.com/300x300" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"> <img src="http://via.placeholder.com/300x300" alt=""> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->
    <section class="section-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="ce-feature-box-3 text-center">
                        <div class="icon-plain-medium icon center text-primary"><span class="pe-7s-monitor text-primary"></span></div>
                        <br/>
                        <h3 class="font-weight-4">Shortcodes</h3>
                        <p>Pellentesque ut risus a odio posuere aliquet. Pellentesque sapien erat, dignissim vel, faucibus eget, vulputate eget, nulla.</p>
                        <br/>
                        <br/>
                        <a class="btn btn-border light border-1x btn-xround-2 uppercase" href="#"><i class="fa fa-play-circle" aria-hidden="true"></i> Read more</a> </div>
                </div>
                <!--end item-->

                <div class="col-md-4">
                    <div class="ce-feature-box-3 text-center">
                        <div class="icon-plain-medium icon center text-primary"><span class="pe-7s-folder text-primary"></span></div>
                        <br/>
                        <h3 class="font-weight-4">PSD Files</h3>
                        <p>Pellentesque ut risus a odio posuere aliquet. Pellentesque sapien erat, dignissim vel, faucibus eget, vulputate eget, nulla.</p>
                        <br/>
                        <br/>
                        <a class="btn btn-prim btn-xround-2 uppercase" href="#"><i class="fa fa-play-circle" aria-hidden="true"></i> Read more</a> </div>
                </div>
                <!--end item-->

                <div class="col-md-4">
                    <div class="ce-feature-box-3 text-center">
                        <div class="icon-plain-medium icon center text-primary"><span class="pe-7s-search text-primary"></span></div>
                        <br/>
                        <h3 class="font-weight-4">Creative Layouts</h3>
                        <p>Pellentesque ut risus a odio posuere aliquet. Pellentesque sapien erat, dignissim vel, faucibus eget, vulputate eget, nulla.</p>
                        <br/>
                        <br/>
                        <a class="btn btn-border border-1x btn-xround-2 light uppercase" href="#"><i class="fa fa-play-circle" aria-hidden="true"></i> Read more</a> </div>
                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->
    <section class="section-primary">
        <div class="container-fluid"> </div>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-md-7 col-sm-12 col-xs-12 margin-bottom"> <img src="http://via.placeholder.com/1500x1100" alt="" class="img-responsive"/> </div>
                <!--end item-->

                <div class="col-md-5 sec-padding">
                    <div class="col-md-8">
                        <h2 class="ce-sec-title font-weight-6 less-mar-1 text-white">Build Modern, creative and clean templates</h2>
                        <br/>
                        <h5 class="raleway text-white">Lorem ipsum dolor sit amet consectetuer adipiscing elit Suspendisse et justo .</h5>
                        <br/>
                        <div class="iconlist-2">
                            <div class="icon"><i class="fa fa-arrow-circle-right text-white"></i></div>
                            <div class="text-white"> Pellentesque sit amet augue eu orci cursus fermentum.</div>
                        </div>
                        <!--end item-->

                        <div class="iconlist-2">
                            <div class="icon"><i class="fa fa-arrow-circle-right text-white"></i></div>
                            <div class="text-white"> Maecenas fringilla orci ultrices nulla consectetur id.</div>
                        </div>
                        <!--end item-->

                        <div class="iconlist-2">
                            <div class="icon"><i class="fa fa-arrow-circle-right text-white"></i></div>
                            <div class="text-white">Fringilla orci ultrices nulla consectetur id suscipit .</div>
                        </div>
                        <!--end item-->

                        <div class="clearfix"></div>
                        <br/>
                        <br/>
                        <a class="btn btn-white btn-round uppercase" href="#"><i class="fa fa-play-circle" aria-hidden="true"></i> Read more</a> </div>
                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>


    <div class="parallax vertical-align" data-parallax-bg-image="http://via.placeholder.com/2000x1300" data-parallax-speed="0.9" data-parallax-direction="down">
        <div class="parallax-overlay bg-opacity-8">
            <div class="container sec-tpadding-2 sec-bpadding-2">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sec-title-container text-left">
                            <h2 class="font-weight-6 less-mar-1 line-height-5 text-white">Know more about our company<br/>
                                <span class="font-weight-3 text-white">and get unlimited features</span></h2>
                            <h6 class="ce-sub-text raleway align-left text-white opacity-3">Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet ligula etiam sit amet dolor Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</h6>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!--end title-->

                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin-bottom">
                        <div class="ce-feature-box-6 no-margin">
                            <div class=" iconbox-medium icon round"><span class="pe-7s-look"></span></div>
                            <div class="text-box">
                                <h1 class="text-white font-weight-4 less-mar-1 padding-top-1 title">3924</h1>
                                <h5 class="text-white">Projects</h5>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin-bottom">
                        <div class="ce-feature-box-6 no-margin">
                            <div class=" iconbox-medium icon round"><span class="pe-7s-server"></span></div>
                            <div class="text-box">
                                <h1 class="text-white font-weight-4 less-mar-1 padding-top-1 title">1462</h1>
                                <h5 class="text-white">Compleated</h5>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin-bottom">
                        <div class="ce-feature-box-6 no-margin">
                            <div class=" iconbox-medium icon round"><span class="pe-7s-search"></span></div>
                            <div class="text-box">
                                <h1 class="text-white font-weight-4 less-mar-1 padding-top-1 title">2547</h1>
                                <h5 class="text-white">Happy Clients</h5>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin-bottom">
                        <div class="ce-feature-box-6 no-margin">
                            <div class=" iconbox-medium icon round"><span class="pe-7s-cup"></span></div>
                            <div class="text-box">
                                <h1 class="text-white font-weight-4 less-mar-1 padding-top-1 title">1789</h1>
                                <h5 class="text-white">Awards</h5>
                            </div>
                        </div>
                    </div>
                    <!--end item-->
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- end section -->


    <section class="sec-padding section-bgimg-13">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-centered">
                    <div class="col-sm-12">
                        <div class="sec-title-container text-center">
                            <h5 class="font-weight-4 less-mar-1 line-height-4 opacity-9">Our creative team gives you best Support</h5>
                            <h2 class="font-weight-6 less-mar-1 line-height-5">Meet Our Creative team and get<br/>
                                More features and Services</h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!--end title-->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="ce-feature-box-53">
                            <div class="img-box">
                                <div class="overlay text-left">
                                    <h4 class="title less-mar-1">Benjamin</h4>
                                    <p class="sub-text">Founder & CEO</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
                                    <br/>
                                    <ul class="sc-icons">
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/> </div>
                        </div>
                    </div>
                    <!-- end item -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="ce-feature-box-53">
                            <div class="img-box">
                                <div class="overlay text-left">
                                    <h4 class="title less-mar-1">Isabella</h4>
                                    <p class="sub-text">Developer</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
                                    <br/>
                                    <ul class="sc-icons">
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/> </div>
                        </div>
                    </div>
                    <!-- end item -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="ce-feature-box-53">
                            <div class="img-box">
                                <div class="overlay text-left">
                                    <h4 class="title less-mar-1">William</h4>
                                    <p class="sub-text">Designer</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
                                    <br/>
                                    <ul class="sc-icons">
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/> </div>
                        </div>
                    </div>
                    <!-- end item -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="ce-feature-box-53">
                            <div class="img-box">
                                <div class="overlay text-left">
                                    <h4 class="title less-mar-1">Charlotte</h4>
                                    <p class="sub-text">Marketing</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
                                    <br/>
                                    <ul class="sc-icons">
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/> </div>
                        </div>
                    </div>
                    <!-- end item -->

                </div>
                <!--end main-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->

    <section class="sec-padding-2 section-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="less-mar-1 font-weight-4 line-height-4 text-white">We offer high Quality Templates and Detailed digital Works </h3>
                    <p class="text-white opacity-6">Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar. </p>
                    <div class="clearfix"></div>
                    <br/>
                    <a class="btn btn-white btn-round uppercase" href="#"><i class="fa fa-play-circle" aria-hidden="true"></i> Get Started</a> &nbsp;&nbsp; <a class="btn btn-border white btn-round uppercase" href="#"><i class="fa fa-play-circle" aria-hidden="true"></i> View more</a> </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--end section-->
    <!-- Modal train -->
    <div class="modal fade" id="trainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vous voyagez en train</h5>
                </div>
                <div class="modal-body">
                    <div class="smart-wrap" style="min-height: 140px">
                        <div class="smart-forms">


                            <div class="form-body">
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_train" type="search" class="gui-input"
                                               placeholder="Numéro de train">
                                        <span class="field-icon"><i class="fa fa-train"></i></span>
                                    </label>
                                </div>
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_train_date" type="date" class="gui-input"
                                               placeholder="Date de départ">
                                        <span class="field-icon"><i class="fa fa-calendar"></i></span>
                                    </label>
                                </div>
                            </div>
                            <p id="infos"></p>


                        </div><!-- end .smart-forms section -->
                    </div><!-- end .smart-wrap section -->
                </div>
                <div class="modal-footer smart-forms">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!--<button type="button" class="button btn-primary" data-dismiss="modal">Confirmer</button>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal avion -->
    <div class="modal fade" id="planeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vous voyagez en avion</h5>
                </div>
                <div class="modal-body">
                    <div class="smart-wrap" style="min-height: 140px">
                        <div class="smart-forms">


                            <div class="form-body">
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_fly" type="search" class="gui-input"
                                               placeholder="Numéro de votre avion">
                                        <span class="field-icon"><i class="fa fa-plane"></i></span>
                                    </label>
                                </div>
                                <div class="">
                                    <label class="field prepend-icon">
                                        <input id="input_fly_date" type="date" class="gui-input"
                                               placeholder="Date de départ">
                                        <span class="field-icon"><i class="fa fa-calendar"></i></span>
                                    </label>
                                </div>
                            </div>
                            <p id="infos"></p>


                        </div><!-- end .smart-forms section -->
                    </div><!-- end .smart-wrap section -->
                </div>
                <div class="modal-footer smart-forms">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!--<button type="button" class="button btn-primary">Confirmer</button>-->
                </div>
            </div>
        </div>
    </div>


    <?php if (\Illuminate\Support\Facades\Auth::check()) {
        $customer = \Illuminate\Support\Facades\Auth::user()->customer->id;
    } else {
        $customer = "";
    }

    ?>

@endsection

@section('custom-scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var departments;
        var pos_depart_ok = false;
        var pos_arrivee_ok = false;
        var place_arrivee;
        var place_depart;
        var tabGeocSNCF = {};

        $('.js-opa').hover(function(){
            $(this).css('opacity', '1');
        },function(){
                $(this).css('opacity', '0.80');
        }
        );

        $(document).ready(function () {
            // On est sur que la lib google maps est load
            $(window).load(function(){

                /****************** Autocomplete google *********************/

                function initAutocomplete() {
                    // Create the autocomplete object, restricting the search to geographical
                    // location types.
                    autocompleteDepart = new google.maps.places.Autocomplete(
                        /** @type {!HTMLInputElement} */(document.getElementById('adresse_input_depart')),
                        {

                            types: ['address'],
                            language: 'fr',
                            componentRestrictions: {country: 'fr'}
                        });

                    autocompleteArrivee = new google.maps.places.Autocomplete(
                        /** @type {!HTMLInputElement} */(document.getElementById('adresse_input_arrivee')),
                        {
                            types: ['address'],
                            language: 'fr',
                            componentRestrictions: {country: 'fr'}
                        });

                    /****************** LISTENERS *********************************/
                    autocompleteDepart.addListener('place_changed', function () {
                        if (this.getPlace().geometry.location) {
                            start_pos = this.getPlace().geometry.location;
                            if (verifyDepartment(this.getPlace())) {
                                pos_depart_ok = true;
                                place_depart = this.getPlace();
                                swal("Lieu de prise en charge OK");
                            } else {
                                printErrorDepartments(true);
                            }
                        }
                    });

                    autocompleteArrivee.addListener('place_changed', function () {
                        end_pos = this.getPlace().geometry.location;
                        if (verifyDepartment(this.getPlace())) {
                            pos_arrivee_ok = true;
                            place_arrivee = this.getPlace();
                            swal("Lieu de livraison OK");
                        } else {
                            printErrorDepartments(false);
                        }
                    });
                    /******************** FIN LISTENERS *******************************/

                }

                function printErrorDepartments(depart) {
                    var dep_string = "";
                    for (var k = 0; k < departments.length; k++) {
                        dep_string += departments[k].name + " (" + departments[k].number + ") "
                    }
                    if (depart) swal("Départ : Le service n'est disponible que dans les départements suivants : " + dep_string);
                    else swal("Arrivée : Le service n'est disponible que dans les départements suivants : " + dep_string);
                }

                /**
                 * Vérifie si l'adresse est dans les départements valide [TRUE] si ok [FALSE] sinon
                 **/
                function verifyDepartment(place) {
                    //var bdx_metropole = {33130, 33370 ,33110,33170,33700,33185,33530,33127,33400,33810,33290,33150,33520,33160,33310,33440,33270,33140,33560,33600,33320,33800,33100,33000,33200,33300};
                    var res = place.address_components;
                    var found = false;
                    for (var i = 0; i < res.length; i++) {
                        for (var j = 0; j < res[i].types.length; j++) {
                            if (res[i].types[j] == "postal_code" || res[i].types[j] == "administrative_area_level_2") {
                                // We use FOUND to know if there is a postal code for the place
                                // For exemple, there is no postal code for Paris
                                var dep = res[i].long_name;
                                for (var k = 0; k < departments.length; k++) {
                                    //console.log(departments[k].number);
                                    if (dep.substr(0, 2) == departments[k].number) {
                                        found = true;//On a trouvé une correspondance
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    return found;
                }


                /*********** API SNCF ***************************/
                var domain = 'https://data.sncf.com/';
                var key_sncf = '{{config('constants.SNCF_API_KEY')}}';

                $(function () { // this will be called when the DOM is ready
                    initAutocomplete();
                    $('#input_train').on('input paste', function () {

                        call_sncf();
                    });

                    $('#input_train_date').on('change', function () {
                        call_sncf();
                    });
                });

                function call_sncf() {
                    var val = $('#input_train').val();
                    var dateVoyage = $('#input_train_date').val();
                    //  since=20170407T120000&until=20170407T120100
                    if (dateVoyage != '') {
                        dateVoyage = (dateVoyage.split('-').join('')) + "T000000";
                        if (val.length >= 4) {

                            $.get('https://api.sncf.com/v1/coverage/sncf/vehicle_journeys/?headsign=' + val + '&since=' + dateVoyage + '&key=' + key_sncf + ' ', function (data) {
                                traitement_gares(data);
                            }).fail(function () {
                                swal("Ce numéro de train n'est pas valide");
                                $('#input_train_date').val(null);
                            });
                        } else {
                            swal("Numéro de billet invalide");
                        }
                    }
                    else {
                        //swal("date de voyage non spécifiée");
                    }
                }

                function traitement_gares(data) {
                    console.log(data);
                    var stops = data.vehicle_journeys[0].stop_times;
                    var geocoders_promises = [];
                    for (var i = 0; i < stops.length; i++) {
                        var pos = {
                            lat: parseFloat(stops[i].stop_point.coord.lat),
                            lng: parseFloat(stops[i].stop_point.coord.lon)
                        };
                        geocoders_promises.push(geocode(pos, stops[i].stop_point.name));
                        //var returna = geocode(pos);
                        //alert(returna);
                    }

                    $.when(...geocoders_promises).then(function (values) {
                        var tabButtons = {};
                        for (var key in tabGeocSNCF) {
                            tabButtons[key] = {
                                'text': key,
                                'value': key
                            };
                            //console.log('OK pour : ' + key + " object" + tabGeocSNCF[key]);
                        }

                        $('#trainModal').modal('hide');
                        if (tabButtons.length == 0) {
                            swal('Aucune gare trouvée pour ce numéro de train');
                        }
                        swal("Dans quelle gare arrivez-vous ?", {
                            buttons: tabButtons
                        }).then((value) => {
                            $('#adresse_input_depart').val(value);

                            if (value == null) {
                                swal("Aucune gare choisie");
                            }
                            pos_depart_ok = true;
                            place_depart = tabGeocSNCF[value];
                            console.log(place_depart);
                        });


                    });
                }

                function geocode(pos, name, place) {
                    var geocoder = new google.maps.Geocoder();

                    var deferred = $.Deferred();

                    geocoder.geocode({
                            'latLng': pos
                        },
                        function (results, status) {
                            // c'est un appel asynchrone donc on doit vérifier que le retour est correct
                            if (status !== google.maps.GeocoderStatus.OK) {

                            }
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (verifyDepartment(results[1])) {
                                    tabGeocSNCF[name] = results[1];
                                    console.log(name);
                                }
                                console.log("==================================");
                            }
                            deferred.resolve(results);
                        });

                    return deferred.promise();
                }


                /************** Fin API SNCF *********************/


                /**************** API FLIGHT STATS  EN SUSPEND ***************/

                var app_id = '{{config('constants.APP_ID_FLIGHT')}}';
                var app_key = '{{config('constants.APP_KEY_FLIGHT')}}';


                $('#js-avion').on('click', function () {
                    flightStats();
                });

                function flightStats() {

                    var vol = $('#input_flight').val();
                    var airport = $('#input_airport').val();
                    var dateVoyage = $('#date').val();

                    var compagny = vol.substring(0, 2);
                    var flight_number = vol.substring(2, 6);
                    var year = dateVoyage.substring(0, 4);
                    var month = dateVoyage.substring(5, 7);
                    var day = dateVoyage.substring(8, 10);


                    if (vol && dateVoyage) {
                        //$.get(`https://api.flightstats.com/flex/flightstatus/rest/v2/jsonp/flight/status/${compagny}/${flight_number}/arr/${year}/${month}/${day}?appId=${app_id}&appKey=${app_key}&utc=false`, function(data){
                        //  console.log(data);
                        /*
                         * 3 letters code can be annoying for user
                         * there is no need, destination can be checked by a comparaison with an array of destination (from the database)
                         */
                        $.ajax({
                            url: 'https://api.flightstats.com/flex/flightstatus/rest/v2/jsonp/flight/status/' + compagny + '/' + flight_number + '/arr/' + year + '/' + month + '/' + day + '?appId=' + app_id + '&appKey=' + app_key + '&utc=false',
                            dataType: 'jsonp',
                            success: function (data) {
                                var res = data.flightStatuses[0];
                                //var dateRunway = new Date(res.operationalTimes.estimatedRunwayArrival.dateLocal) ; //NOT ALWAYS DFINED !!!!!
                                var dateGate = new Date(res.operationalTimes.scheduledGateArrival.dateLocal);
                                if (res.operationalTimes.estimatedGateArrival) {
                                    dateGate = new Date(res.operationalTimes.estimatedGateArrival.dateLocal); //RUNWAY OR GATE
                                }

                                /* var minRunway = dateRunway.getMinutes();
                                 if (minRunway<10){
                                 minRunway='0'+minRunway;
                                 }
                                 */
                                console.log(data);
                                var minGate = dateGate.getMinutes();
                                if (minGate < 10) {
                                    minGate = '0' + minGate;
                                }
                                var departure_airport = res.departureAirportFsCode;
                                var arrival_airport = res.arrivalAirportFsCode;
                                console.log(arrival_airport);
                                var arrivee, city;
                                data.appendix.airports.forEach(function (element) {
                                    if (element.fs == arrival_airport) {
                                        console.log(element);
                                        arrivee = element.name;
                                        city = element.city;
                                    }
                                });


                                if (res.delays) {
                                    var delay = res.delays.arrivalGateDelayMinutes;
                                    if (delay) {
                                        console.log('Il y\'a un retard de ${delay} minute(s) sur ce vol.');
                                    }
                                }
                                console.log('Le client sera à la sortie de ${arrivee} (${city}) le ${dateGate.getDate()}/${dateGate.getMonth()+1}/${dateGate.getFullYear()} à ${dateGate.getHours()}h${minGate}');
                                //  console.log(`Le client sera à la porte à ${dateGate.getHours()}h${minGate}`);
                            },
                            error: function (e) {
                                console.log(e);
                            }
                        });
                    }
                    else {
                        if (!vol) {
                            console.log("Vous devez spécifier un numéro de vol");
                        }
                        if (!airport) {
                            console.log("Vous devez spécifier un aéroport d'arrivée (code à 3 chiffres)");
                        }
                        if (!dateVoyage) {
                            console.log("Vous devez spécifier une date de voyage");
                        }
                    }

                }



                initAutocomplete();
                //Récupération des departements autorisés
                $.ajax({
                    type: "POST",
                    url: '{{url('ajax/departments')}}',
                    data: {
                        _token: CSRF_TOKEN,
                    },
                    success: function (response) {
                        departments = response;

                    }

                });

                $('.show-train').on('click', function () {
                    $('.js-show-train').show();
                    $(this).hide();
                });

                $('.show-flight').on('click', function () {
                    $('.js-show-flight').show();
                    $(this).hide()
                });

                $('.js_valid_deliver').on('click', function () {
                    if (pos_depart_ok && pos_arrivee_ok) {

                        delivery = {
                            customer_id: "{{$customer}}"
                        };
                        start_position = {
                            lat: place_depart.geometry.location.lat(),
                            lng: place_depart.geometry.location.lng(),
                            address: place_depart.formatted_address
                        };
                        end_position = {
                            lat: place_arrivee.geometry.location.lat(),
                            lng: place_arrivee.geometry.location.lng(),
                            address: place_arrivee.formatted_address
                        };


                        $.ajax({
                            type: "POST",
                            url: '{{url('create/delivery')}}',
                            data: {
                                start_position: start_position,
                                end_position: end_position,
                                delivery: delivery,
                                _token: CSRF_TOKEN

                            },
                            success: function (response) {
                                swal({
                                    title: 'Confirmer vous la demande de prise en charge ?',
                                    text: "Le coût est de " + response.price + " €",
                                    icon: 'success',
                                    buttons: {
                                        cancel: false,
                                        canceled: {
                                            text: "Annuler",
                                            value: "cancel"
                                        },
                                        roll: {
                                            text: "Procéder au paiement!",
                                            value: "confirm",
                                        },
                                    },
                                }).then((result) => {

                                    if (result == 'confirm') {
                                        document.location.href = "{{url('delivery')}}" + '/' + response.id + '/save'
                                    } else if (result == 'cancel') {
                                        swal(
                                            'Annulation!',
                                            '.',
                                            'success'
                                        )
                                    }
                                })

                            }

                        });
                    }else{
                        swal("Pos départ : "+pos_depart_ok+" Pos arrivée : "+pos_arrivee_ok);
                    }


                });
            });
        });




    </script>
@endsection