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
                        <li><a href="{{ url('/apropos') }}"><i class="fa fa-angle-right"></i> À propos</a></li>
                        <li><a href="{{ url('/mentionslegales') }}"><i class="fa fa-angle-right"></i> Mentions légales</a></li>
                        <li><a href="{{ url('/regles') }}"><i class="fa fa-angle-right"></i> Règles</a></li>
                        <li><a href="{{ url('/aide') }}"><i class="fa fa-angle-right"></i> Aide</a></li>
                    </ul>
                </div>
                <!--end item-->

                <div class="col-md-4 col-xs-12 clearfix margin-bottom">
                    <h4 class="less-mar3 font-weight-5">Découvrir</h4>
                    <div class="clearfix"></div>
                    <br/>
                    <ul class="footer-quick-links-5">
                        <li><a href="{{ url('/confiance') }}"><i class="fa fa-angle-right"></i> Confiance</a></li>
                        <li><a href="{{ url('/securite') }}"><i class="fa fa-angle-right"></i> Sécurité</a></li>
                    </ul>
                </div>
                <!--end item-->

                <div class="col-md-4 col-xs-12 clearfix margin-bottom">
                    <h4 class="less-mar3 font-weight-5">Partenaires</h4>
                    <div class="clearfix"></div>
                    <br/>
                    <ul class="footer-quick-links-5">
                        <li><a href="{{ url('/accespro') }}"><i class="fa fa-angle-right"></i> Accès professionnel</a></li>
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
                <div class="fo-copyright-holder text-center"> Copyright © <span id="year"></span> | Deliverbag.fr | <a class="tgclink" href="{{url('/tgc')}}">Termes générales et conditions</a></div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
</footer>
