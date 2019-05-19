<footer>
    <div class="sec-padding">
        <div class="container">
            <div class="row">
                <!--end item-->

                <div class="col-md-4 col-xs-12 clearfix margin-bottom">
                    <h4 class="less-mar3 font-weight-5">{{trans('layout.aproposnous')}}</h4>
                    <div class="clearfix"></div>
                    <br/>
                    <ul class="footer-quick-links-5">
                        <li><a href="{{ url('/apropos') }}"><i class="fa fa-angle-right"></i>{{trans('layout.apropos')}}</a></li>
                        <li><a href="{{ url('/mentionslegales') }}"><i class="fa fa-angle-right"></i>{{trans('layout.mentionslegales')}}</a></li>
                        <li><a href="{{ url('/regles') }}"><i class="fa fa-angle-right"></i>{{trans('layout.regles')}}</a></li>
                        <li><a href="{{ url('/aide') }}"><i class="fa fa-angle-right"></i>{{trans('layout.aide')}}</a></li>
                    </ul>
                </div>
                <!--end item-->

                <div class="col-md-4 col-xs-12 clearfix margin-bottom">
                    <h4 class="less-mar3 font-weight-5">{{trans('layout.decouvrir')}}</h4>
                    <div class="clearfix"></div>
                    <br/>
                    <ul class="footer-quick-links-5">
                        <li><a href="{{ url('/confiance') }}"><i class="fa fa-angle-right"></i>{{trans('layout.confiance')}}</a></li>
                        <li><a href="{{ url('/securite') }}"><i class="fa fa-angle-right"></i>{{trans('layout.securite')}}</a></li>
                    </ul>
                </div>
                <!--end item-->

                <div class="col-md-4 col-xs-12 clearfix margin-bottom">
                    <h4 class="less-mar3 font-weight-5">{{trans('layout.partenaires')}}</h4>
                    <div class="clearfix"></div>
                    <br/>
                    <ul class="footer-quick-links-5">
                        <li><a href="{{ url('/accespro') }}"><i class="fa fa-angle-right"></i>{{trans('layout.accespro')}}</a></li>
                    </ul>
                </div>
                <!--end item-->

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- end section -->

    <section class="sec-padding-6 section-medium-dark">
        <div class="container">
            <div class="row">
                <div class="fo-copyright-holder text-center"> Copyright © <span id="year"></span> | Deliverbag.fr | <a class="tgclink" href="{{url('/tgc')}}">{{trans('layout.tgc')}}</a></div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
</footer>
