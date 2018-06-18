<!-- all js here -->


<script src="{{asset('iblue/js/jquery/jquery.js')}}"></script>
<script src="{{asset('iblue/js/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{asset('iblue/js/less/less.min.js')}}" data-env="development"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Scripts END -->

<!-- Template scripts -->
<script src="{{asset('iblue/js/megamenu/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/ytplayer/jquery.mb.YTPlayer.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/ytplayer/elementvideo-custom.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/ytplayer/play-pause-btn.js')}}"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{config('constants.GOOGLE_API_KEY')}}&libraries=places" async defer></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
(Load Extensions only on Local File Systems !
The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/revolution-slider/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/promise-polyfill"></script>
<script type="text/javascript">
    var tpj=jQuery;
    var revapi4;
    tpj(document).ready(function() {
        if(tpj("#rev_slider").revolution == undefined){
            revslider_showDoubleJqueryError("#rev_slider");
        }else{
            revapi4 = tpj("#rev_slider").show().revolution({
                sliderType:"standard",
                jsFileLocation:"js/revolution-slider/js/",
                sliderLayout:"auto",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    onHoverStop:"off",
                    arrows: {
                        style:"uranus",
                        enable:true,
                        hide_onmobile:false,
                        hide_under:100,
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        tmp:'',
                        left: {
                            h_align:"left",
                            v_align:"center",
                            h_offset:80,
                            v_offset:0
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:80,
                            v_offset:0
                        }
                    }
                    ,
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,



                },
                viewPort: {
                    enable:true,
                    outof:"pause",
                    visible_area:"80%"
                },

                responsiveLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[850,730,600,550],
                lazyType:"smart",
                parallax: {
                    type:"mouse",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,6,7,12,16,10,50],
                },
                shadow:0,
                spinner:"off",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"off",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                disableProgressBar:"on",
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
        }
    });	/*ready*/
</script>
<script type="text/javascript">


    var revapi280;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_280_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_280_1");
        } else {
            revapi280 = tpj("#rev_slider_280_1").show().revolution({
                sliderType: "hero",
                jsFileLocation: "../../revolution/js/",
                sliderLayout: "auto",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {},
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1000, 1024, 778, 480],
                gridheight: [700, 520, 420, 420],
                lazyType: "none",
                parallax: {
                    type: "scroll",
                    origo: "slidercenter",
                    speed: 1000,
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                    type: "scroll",
                },
                shadow: 0,
                spinner: "spinner2",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "60",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    disableFocusListener: false,
                }
            });
        }
    }); /*ready*/
</script>

<script>
    $(window).load(function(){
        setTimeout(function(){

            $('.loader-live').fadeOut();
        },1000);
    })

</script>
<script src="{{asset('iblue/js/parallax/parallax-background.min.js')}}"></script>
<script>
    (function ($) {
        $('.parallax').parallaxBackground();
    })(jQuery);
</script>
<script src="{{asset('iblue/js/tabs/js/responsive-tabs.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('iblue/js/cubeportfolio/jquery.cubeportfolio.min.js')}}"></script>
<script type="text/javascript" src="{{asset('iblue/js/cubeportfolio/main-mosaic3-cols3.js')}}"></script>
<script src="{{asset('iblue/js/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('iblue/js/owl-carousel/custom.js')}}"></script>
<script src="{{asset('iblue/js/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('iblue/js/accordion/js/smk-accordion.js')}}"></script>
<script src="{{asset('iblue/js/accordion/js/custom.js')}}"></script>
<script src="{{asset('iblue/js/progress-circle/raphael-min.js')}}"></script>
<script src="{{asset('iblue/js/progress-circle/custom.js')}}"></script>
<script src="{{asset('iblue/js/progress-circle/jQuery.circleProgressBar.js')}}"></script>
<script src="{{asset('iblue/js/functions/functions.js')}}"></script>