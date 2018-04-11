<footer class="footer-area">
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="footer-logo">
                        <a href="index.html"><img style="width: 180px; height: 80px" src="{!!  asset('inbo/images/product-inbo/logo_inbo_final.png') !!}" alt="Logo Demo"></a>
                    </div>
                    <!--footer-text-start-->
                    <div class="footer-top-content">
                        <p class="des">
                            In’Bô est une entreprise où nous imaginons, concevons et fabriquons des produits en bois bambou et fibre naturelle.
                        </p>
                        <p class="des">
                            C’est avant tout une aventure humaine fondée par 5 ingénieurs autour de valeurs fortes : le « fait main dans les Vosges », le « respect de la matière » et un « savoir-faire unique ».
                        </p>
                        <p class="des">
                            In’Bô vous propose de découvrir aujourd’hui 2 univers : des lunettes en bois et des skates.
                        </p>
                    </div>
                    <!--footer-text-end-->
                </div>
                <!--footer-contact-info-start-->
                <div class="footer-contact-info">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h3 class="wedget-title">Contactez-nous</h3>
                        <div class="footer-contact">
                            <p class="adress"><label>Atelier :</label><span class="ft-content">[ In'Bô ], ZA les Bouleaux<br>88240 Les Voivres</span></p>
                            <p class="phone"><label>Téléphone :</label><span class="ft-content phone-num"><span class="phone1">03 57 39 00 10</span></span></p>
                            <p class="web"><label>email :</label><span class="ft-content web-site"><a href="mailto:contact@inbo.fr">contact@inbo.fr</a></span></p>
                        </div>
                    </div>
                </div>
                <!--footer-contact-info-end-->
            </div>
        </div>
    </div>
    <!--footer-top-area-end-->
    <!--footer-bottom-area-start-->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="copy-right">
                        <span> Copyright &copy; <a href="http://www.inbo.fr/">In'Bô</a>. Tous droits réservés.</span>
                        <a href="#!" class="mentions-legales" style="margin-left: 30px">Mentions légales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-bottom-area-end-->
</footer>
<script src="{{asset('inbo/js/vendor/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('js/sweetalert.js')}}"></script>
<!--End-footer-wrap-->
<script>
    $('.mentions-legales').on("click", function(){
        swal("Editeur du site btb.inbo.fr : SARL IN'BO - ZA LES BOULEAUX, 88240 LES VOIVRES / Capital 20000 € / SIRET 82152444400014 / Directeur de publication : Aurele CHARLET / Webmaster : Aurele CHARLET contact@inbo.fr (contact@inbo.fr) - 03 57 39 00 10 / En cours de déclaration CNIL / Hébergeur : OVH 2 rue Kellermann 59100 ROUBAIX www.ovh.com (www.ovh.com)");
    });
</script>