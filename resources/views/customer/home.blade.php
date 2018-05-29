@extends('customer.layouts.app')

@section('content')

    <div class="col-md-12 nopadding">
        <div class="header-section style1 pin-style">
            <div class="container">
                <div class="mod-menu">
                    <div class="row">
                        <div class="col-sm-2"><a href="index.html" title="" class="logo style-2 mar-4"> <img
                                        src="iblue/images/logo/logo.png" alt=""> </a></div>
                        <div class="col-sm-10">
                            <div class="main-nav">
                                <ul class="nav navbar-nav top-nav">
                                    <li class="search-parent"><a href="javascript:void(0)" title=""><i
                                                    aria-hidden="true" class="fa fa-search"></i></a>
                                        <div class="search-box ">
                                            <div class="content">
                                                <div class="form-control">
                                                    <input type="text" placeholder="Type to search"/>
                                                    <a href="#" class="search-btn mar-1"><i aria-hidden="true"
                                                                                            class="fa fa-search"></i></a>
                                                </div>
                                                <a href="#" class="close-btn mar-1">x</a></div>
                                        </div>
                                    </li>
                                    <li class="cart-parent"><a href="javascript:void(0)" title=""> <i aria-hidden="true"
                                                                                                      class="fa fa-shopping-cart"></i>
                                            <span class="number mar2"> 4 </span> </a>
                                        <div class="cart-box">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-xs-8"> 2 item(s)</div>
                                                    <div class="col-xs-4 text-right"><span>$99</span></div>
                                                </div>
                                                <ul>
                                                    <li><img src="http://via.placeholder.com/80x80" alt=""> Jean &
                                                        Teashirt <span>$30</span> <a href="#" title=""
                                                                                     class="close-btn">x</a></li>
                                                    <li><img src="http://via.placeholder.com/80x80" alt=""> Jean &
                                                        Teashirt <span>$30</span> <a href="#" title=""
                                                                                     class="close-btn">x</a></li>
                                                </ul>
                                                <div class="row">
                                                    <div class="col-xs-6"><a href="#" title="View Cart"
                                                                             class="btn btn-block btn-warning">View
                                                            Cart</a></div>
                                                    <div class="col-xs-6"><a href="#" title="Check out"
                                                                             class="btn btn-block btn-primary">Check
                                                            out</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="visible-xs menu-icon"><a href="javascript:void(0)"
                                                                        class="navbar-toggle collapsed"
                                                                        data-toggle="collapse" data-target="#menu"
                                                                        aria-expanded="false"> <i aria-hidden="true"
                                                                                                  class="fa fa-bars"></i>
                                        </a></li>
                                </ul>
                                <div id="menu" class="collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="right active"><a href="#">Home</a> <span class="arrow"></span>
                                            <ul class="dm-align-2">
                                                <li><a href="index2.html">Home Page 2</a></li>
                                                <li><a href="index3.html">Home Page 3</a></li>
                                                <li><a href="index4.html">Home Page 4</a></li>
                                                <li><a href="index5.html">Home Page 5</a></li>
                                                <li><a href="index6.html">Home Page 6</a></li>
                                                <li><a href="index7.html">Home Page 7</a></li>
                                                <li><a href="index8.html">Home Page 8</a></li>
                                                <li><a href="index9.html">Home Page 9</a></li>
                                                <li><a href="index10.html">Home Page 10</a></li>
                                                <li class="active"><a href="index.html">Home Default</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="slider-kenburns.html">Pages</a> <span class="arrow"></span>
                                            <ul class="dm-align-2">
                                                <li><a href="#">About <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="page-about1.html">About Style 1</a></li>
                                                        <li><a href="page-about2.html">About Style 2</a></li>
                                                        <li><a href="page-about3.html">About Style 3</a></li>
                                                        <li><a href="page-about4.html">About Style 4</a></li>
                                                        <li><a href="page-about5.html">About Me</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Services <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="page-services1.html">Services Style 1</a></li>
                                                        <li><a href="page-services2.html">Services Style 2</a></li>
                                                        <li><a href="page-services3.html">Services Style 3</a></li>
                                                        <li><a href="page-services4.html">Services Style 4</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Team <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="page-team-classic.html">Team Classic</a></li>
                                                        <li><a href="page-team-parallax.html">Team Parallax</a></li>
                                                        <li><a href="page-team-dark.html">Team dark Style</a></li>
                                                        <li><a href="page-team-creative.html">Team Creative</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">FAQ <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="page-faq1.html">FAQ Style 1</a></li>
                                                        <li><a href="page-faq2.html">FAQ Style 2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Contact<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="page-contact.html">Contact Classic</a></li>
                                                        <li><a href="page-contact-left-sidebar.html">Contact Left
                                                                Sidebar</a></li>
                                                        <li><a href="page-contact-right-sidebar.html">Contact Right
                                                                Sidebar</a></li>
                                                        <li><a href="page-contact-map.html">Full Width Map</a></li>
                                                        <li><a href="page-contact-parallax.html">Contact Parallax</a>
                                                        </li>
                                                        <li><a href="page-contact-captcha.php">Contact With Captcha</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Other Pages 1<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="page-full-width.html">Full Width Page</a></li>
                                                        <li><a href="page-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="page-right-sidebar.html">Right Sidebar</a></li>
                                                        <li><a href="page-packages.html">Package Plans</a></li>
                                                        <li><a href="page-careers.html">Careers</a></li>
                                                        <li><a href="page-coming-soon.html">Coming Soon</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Other Pages 2<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="page-login.html">Login</a></li>
                                                        <li><a href="page-register.html">Register</a></li>
                                                        <li><a href="page-sitemap.html">Sitemap</a></li>
                                                        <li><a href="page-maintenance.html">Maintenance</a></li>
                                                        <li><a href="page-404.html">404 Error Page</a></li>
                                                        <li><a href="page-404-2.html">404 Error Page 2</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="slider-kenburns.html">Features</a> <span class="arrow"></span>
                                            <ul class="dm-align-2">
                                                <li><a href="#">Sliders <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="slider-kenburns.html">KenBurns</a></li>
                                                        <li><a href="slider-parallax.html">Parallax</a></li>
                                                        <li><a href="slider-3d.html">3D</a></li>
                                                        <li><a href="slider-carousel.html">Carousel</a></li>
                                                        <li><a href="slider-gallery.html">Gallery</a></li>
                                                        <li><a href="slider-scroll-effect.html">Scroll Efects</a></li>
                                                        <li><a href="slider-vimeo.html">Vimeo Video</a></li>
                                                        <li><a href="slider-youtube.html">Youtube Video</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Headers <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="index7.html">Header Light</a></li>
                                                        <li><a href="page-about5.html">Header Dark</a></li>
                                                        <li><a href="index4.html">Header Modern</a></li>
                                                        <li><a href="index.html">Header Transparent</a></li>
                                                        <li><a href="page-team-creative.html">Header Creative</a></li>
                                                        <li><a href="index.html">Header Left Logo</a></li>
                                                        <li><a href="page-team-creative.html">Header Center Logo</a>
                                                        </li>
                                                        <li><a href="index7.html">Header White</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Menu Styles <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="index.html">Menu Transparent</a></li>
                                                        <li><a href="index2.html">Menu Left logo</a></li>
                                                        <li><a href="index7.html">Menu light</a></li>
                                                        <li><a href="index2.html">Menu Dark</a></li>
                                                        <li><a href="page-team-creative.html">Menu Center Logo</a></li>
                                                        <li><a href="index4.html">Menu Boxed</a></li>
                                                        <li><a href="page-team-creative.html">Menu Center</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Loading Styles<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="loading-style1.html">Loading Style 1</a></li>
                                                        <li><a href="loading-style2.html">Loading Style 2</a></li>
                                                        <li><a href="loading-style3.html">Loading Style 3</a></li>
                                                        <li><a href="loading-style4.html">Loading Style 4</a></li>
                                                        <li><a href="loading-style5.html">Loading Style 5</a></li>
                                                        <li><a href="loading-style6.html">Loading Style 6</a></li>
                                                        <li><a href="loading-style7.html">Loading Style 7</a></li>
                                                        <li><a href="loading-style8.html">Loading Style 8</a></li>
                                                        <li><a href="loading-style9.html">Loading Style 9</a></li>
                                                        <li><a href="loading-style10.html">Loading Style 10</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Footer Styles<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="index3.html">Footer Dark</a></li>
                                                        <li><a href="index4.html">Footer Light</a></li>
                                                        <li><a href="index3.html">Footer Simple</a></li>
                                                        <li><a href="page-about1.html">Footer Parallax</a></li>
                                                        <li><a href="index8.html">Footer Big</a></li>
                                                        <li><a href="index5.html">Footer Modern</a></li>
                                                        <li><a href="index10.html">Footer With Map</a></li>
                                                        <li><a href="page-about1.html">Footer Transparent</a></li>
                                                        <li><a href="index4.html">Footer Classic</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Videos<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shortcodes-videos.html">Youtube Videos</a></li>
                                                        <li><a href="shortcodes-videos.html">Vimeo Videos</a></li>
                                                        <li><a href="shortcodes-videos.html">HTML 5 Videos</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Layered PSD Files</a></li>
                                                <li><a href="#">Unlimited Colors</a></li>
                                                <li><a href="#">Wide & Boxed</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu"><a href="header-style3.html">Portfolio</a> <span
                                                    class="arrow"></span>
                                            <ul>
                                                <li><a href="#" title="home samples">Portfolio columns</a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="portfolio-1-columns.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; One Column</a>
                                                        </li>
                                                        <li><a href="portfolio-2-columns.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Two Column</a>
                                                        </li>
                                                        <li><a href="portfolio-3-columns.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Three
                                                                Column</a></li>
                                                        <li><a href="portfolio-4-columns.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Four
                                                                Column</a></li>
                                                        <li><a href="portfolio-5-columns.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Five
                                                                Column</a></li>
                                                        <li><a href="portfolio-6-columns.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Six Column</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Portfolio Styles</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="portfolio-masonry.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                Masonry</a></li>
                                                        <li><a href="portfolio-masonry-projects.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                Masonry-Projects</a></li>
                                                        <li><a href="portfolio-mosaic.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Mosaic</a>
                                                        </li>
                                                        <li><a href="portfolio-mosaic-flat.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                Mosaic-Flat</a></li>
                                                        <li><a href="portfolio-mosaic-projects.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                Mosaic-Projects</a></li>
                                                        <li><a href="portfolio-slider-projects.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                slider-projects</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Portfolio Styles</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="portfolio-full-width.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Full Width</a>
                                                        </li>
                                                        <li><a href="portfolio-gallery.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                Gallery</a></li>
                                                        <li><a href="portfolio-classic.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                Classic</a></li>
                                                        <li><a href="portfolio-nospace.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; No
                                                                Space</a></li>
                                                        <li><a href="portfolio-boxed-size.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Boxed Size</a>
                                                        </li>
                                                        <li><a href="portfolio-modern.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Modern</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Portfolio Single Page</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="portfolio-parallax.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Parallax
                                                                Image</a></li>
                                                        <li><a href="portfolio-video.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Video
                                                                Background</a></li>
                                                        <li><a href="portfolio-left-sidebar.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Left
                                                                Sidebar</a></li>
                                                        <li><a href="portfolio-right-sidebar.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Right
                                                                Sidebar</a></li>
                                                        <li><a href="portfolio-carousel.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp;
                                                                Carousel</a></li>
                                                        <li><a href="portfolio-fullwidth-image.html"><i
                                                                        class="fa fa-angle-right"></i> &nbsp; Full width
                                                                Image</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu five-col"><a href="carousel-sliders.html">Shortcodes</a>
                                            <span class="arrow"></span>
                                            <ul>
                                                <li><a href="#">Shortcodes 1</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shortcodes-accordions.html"><i
                                                                        class="fa fa-plus-circle"></i> &nbsp; Accordions</a>
                                                        </li>
                                                        <li><a href="shortcodes-alerts.html"><i
                                                                        class="fa fa-exclamation"
                                                                        aria-hidden="true"></i> &nbsp; Alerts</a></li>
                                                        <li><a href="shortcodes-animations.html"><i
                                                                        class="fa fa-bars"></i> &nbsp; Animations</a>
                                                        </li>
                                                        <li><a href="shortcodes-blockquotes.html"><i
                                                                        class="fa fa-quote-right"
                                                                        aria-hidden="true"></i> &nbsp; Blockquotes</a>
                                                        </li>
                                                        <li><a href="shortcodes-breadcrumbs.html"><i class="fa fa-share"
                                                                                                     aria-hidden="true"></i>
                                                                &nbsp; Breadcrumbs</a></li>
                                                        <li><a href="shortcodes-buttons.html"><i
                                                                        class="fa fa-external-link"
                                                                        aria-hidden="true"></i> &nbsp; Buttons</a></li>
                                                        <li><a href="shortcodes-call-to-action.html"><i
                                                                        class="fa fa-level-up" aria-hidden="true"></i>
                                                                &nbsp; Call to Action</a></li>
                                                        <li><a href="shortcodes-clients-logos.html"><i
                                                                        class="fa fa-user" aria-hidden="true"></i>
                                                                &nbsp; Clients Logos</a></li>
                                                        <li><a href="shortcodes-carousel-sliders.html"><i
                                                                        class="fa fa-sort" aria-hidden="true"></i>
                                                                &nbsp; Carousel Sliders</a></li>
                                                        <li><a href="shortcodes-counters.html"><i
                                                                        class="fa fa-text-height"
                                                                        aria-hidden="true"></i> &nbsp; Counters</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Shortcodes 2</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shortcodes-content-boxes.html"><i class="fa fa-th"
                                                                                                       aria-hidden="true"></i>
                                                                &nbsp; Content Boxes</a></li>
                                                        <li><a href="shortcodes-data-tables.html"><i class="fa fa-table"
                                                                                                     aria-hidden="true"></i>
                                                                &nbsp; Data Tables</a></li>
                                                        <li><a href="shortcodes-date-pickers.html"><i
                                                                        class="fa fa-calendar" aria-hidden="true"></i>
                                                                &nbsp; Date Pickers</a></li>
                                                        <li><a href="shortcodes-dropcaps.html"><i class="fa fa-font"
                                                                                                  aria-hidden="true"></i>
                                                                &nbsp; Dropcap & Highlight</a></li>
                                                        <li><a href="shortcodes-dividers.html"><i class="fa fa-minus"
                                                                                                  aria-hidden="true"></i>
                                                                &nbsp; Dividers</a></li>
                                                        <li><a href="shortcodes-file-uploads.html"><i
                                                                        class="fa fa-upload" aria-hidden="true"></i>
                                                                &nbsp; File Uploads</a></li>
                                                        <li><a href="shortcodes-forms.html"><i class="fa fa-envelope"
                                                                                               aria-hidden="true"></i>
                                                                &nbsp; Forms</a></li>
                                                        <li><a href="shortcodes-grids.html"><i class="fa fa-th-list"
                                                                                               aria-hidden="true"></i>
                                                                &nbsp; Grids</a></li>
                                                        <li><a href="shortcodes-heading-styles.html"><i
                                                                        class="fa fa-text-height"
                                                                        aria-hidden="true"></i> &nbsp; Heading
                                                                Styles</a></li>
                                                        <li><a href="shortcodes-hover-styles.html"><i
                                                                        class="fa fa-picture-o" aria-hidden="true"></i>
                                                                &nbsp; Hover Styles</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Shortcodes 3</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shortcodes-icon-boxes.html"><i
                                                                        class="fa fa-th-large" aria-hidden="true"></i>
                                                                &nbsp; Icon Boxes</a></li>
                                                        <li><a href="shortcodes-icon-circles.html"><i
                                                                        class="fa fa-circle-o" aria-hidden="true"></i>
                                                                &nbsp; Icon Circles</a></li>
                                                        <li><a href="shortcodes-countdown-timers.html"><i
                                                                        class="fa fa-bars" aria-hidden="true"></i>
                                                                &nbsp; Countdown Timers</a></li>
                                                        <li><a href="shortcodes-icon-lists.html"><i class="fa fa-list"
                                                                                                    aria-hidden="true"></i>
                                                                &nbsp; Icon Lists</a></li>
                                                        <li><a href="shortcodes-images.html"><i class="fa fa-picture-o"
                                                                                                aria-hidden="true"></i>
                                                                &nbsp; Images</a></li>
                                                        <li><a href="shortcodes-labels-and-badges.html"><i
                                                                        class="fa fa-adjust" aria-hidden="true"></i>
                                                                &nbsp; Labels and Badges</a></li>
                                                        <li><a href="shortcodes-lightbox.html"><i class="fa fa-th"
                                                                                                  aria-hidden="true"></i>
                                                                &nbsp; Lightbox</a></li>
                                                        <li><a href="shortcodes-lists.html"><i class="fa fa-list-ul"
                                                                                               aria-hidden="true"></i>
                                                                &nbsp; Lists</a></li>
                                                        <li><a href="shortcodes-maps.html"><i class="fa fa-map-marker"
                                                                                              aria-hidden="true"></i>
                                                                &nbsp; Maps</a></li>
                                                        <li><a href="shortcodes-modal-popup.html"><i
                                                                        class="fa fa-search-plus"
                                                                        aria-hidden="true"></i> &nbsp; Modal Popup</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Shortcode 4</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shortcodes-pagenation.html"><i
                                                                        class="fa fa-exchange" aria-hidden="true"></i>
                                                                &nbsp; Pagenation</a></li>
                                                        <li><a href="shortcodes-parallax-backgrounds.html"><i
                                                                        class="fa fa-align-center"
                                                                        aria-hidden="true"></i> &nbsp; Parallax
                                                                Backgrounds</a></li>
                                                        <li><a href="shortcodes-pricing-tables.html"><i
                                                                        class="fa fa-table" aria-hidden="true"></i>
                                                                &nbsp; Pricing Tables</a></li>
                                                        <li><a href="shortcodes-pie-charts.html"><i
                                                                        class="fa fa-pie-chart" aria-hidden="true"></i>
                                                                &nbsp; Pie Charts</a></li>
                                                        <li><a href="shortcodes-pricing-badges.html"><i
                                                                        class="fa fa-external-link"></i> &nbsp; Pricing
                                                                Badges</a></li>
                                                        <li><a href="shortcodes-progress-bars.html"><i
                                                                        class="fa fa-outdent" aria-hidden="true"></i>
                                                                &nbsp; Progress Bars</a></li>
                                                        <li><a href="shortcodes-process-steps.html"><i
                                                                        class="fa fa-long-arrow-right"
                                                                        aria-hidden="true"></i> &nbsp; Process Steps</a>
                                                        </li>
                                                        <li><a href="shortcodes-post-styles.html"><i
                                                                        class="fa fa-pencil" aria-hidden="true"></i>
                                                                &nbsp; Post Styles</a></li>
                                                        <li><a href="shortcodes-toogle-switches.html"><i
                                                                        class="fa fa-toggle-on" aria-hidden="true"></i>
                                                                &nbsp; Toogle Switches</a></li>
                                                        <li><a href="shortcodes-timeline.html"><i
                                                                        class="fa fa-align-left" aria-hidden="true"></i>
                                                                &nbsp; Timeline</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Shortcode 5</a> <span class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shortcodes-star-ratings.html"><i
                                                                        class="fa fa-star-half-o"
                                                                        aria-hidden="true"></i> &nbsp; Star Ratings</a>
                                                        </li>
                                                        <li><a href="shortcodes-sections.html"><i class="fa fa-square-o"
                                                                                                  aria-hidden="true"></i>
                                                                &nbsp; Sections</a></li>
                                                        <li><a href="shortcodes-social-icons.html"><i
                                                                        class="fa fa-twitter" aria-hidden="true"></i>
                                                                &nbsp; Social Icons</a></li>
                                                        <li><a href="shortcodes-tabs.html"><i class="fa fa-th-large"
                                                                                              aria-hidden="true"></i>
                                                                &nbsp; Tabs</a></li>
                                                        <li><a href="shortcodes-team.html"><i class="fa fa-user"
                                                                                              aria-hidden="true"></i>
                                                                &nbsp; Team</a></li>
                                                        <li><a href="shortcodes-testimonials.html"><i
                                                                        class="fa fa-pencil-square"></i> &nbsp;
                                                                Testimonials</a></li>
                                                        <li><a href="shortcodes-tooltips.html"><i class="fa fa-font"
                                                                                                  aria-hidden="true"></i>
                                                                &nbsp; Tooltips</a></li>
                                                        <li><a href="shortcodes-toogles.html"><i class="fa fa-toggle-on"
                                                                                                 aria-hidden="true"></i>
                                                                &nbsp; Toogles</a></li>
                                                        <li><a href="shortcodes-typography.html"><i
                                                                        class="fa fa-text-height"
                                                                        aria-hidden="true"></i> &nbsp; Typography</a>
                                                        </li>
                                                        <li><a href="shortcodes-videos.html"><i
                                                                        class="fa fa-play-circle"
                                                                        aria-hidden="true"></i> &nbsp; Videos</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="right"><a href="#">Blog</a> <span class="arrow"></span>
                                            <ul class="dm-align-2">
                                                <li><a href="#">Classic <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="blog-full-width.html">Full Width</a></li>
                                                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Grids <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="blog-1-columns.html">One Column</a></li>
                                                        <li><a href="blog-2-columns.html">Two Column</a></li>
                                                        <li><a href="blog-3-columns.html">Three Column</a></li>
                                                        <li><a href="blog-4-columns.html">Four Column</a></li>
                                                        <li><a href="blog-5-columns.html">Five Column</a></li>
                                                        <li><a href="blog-6-columns.html">Six Column</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Default<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="blog-default-full-width.html">Full Width</a></li>
                                                        <li><a href="blog-default-left-sidebar.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-default-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-default-author.html">Author Page</a></li>
                                                        <li><a href="blog-default-comments.html">Blog Comments</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Thumbnail<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="blog-full-width-thumbnail.html">Full Width</a></li>
                                                        <li><a href="blog-left-sidebar-thumbnail.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-right-sidebar-thumbnail.html">Right
                                                                Sidebar</a></li>
                                                        <li><a href="blog-author-thumbnail.html">Author Page</a></li>
                                                        <li><a href="blog-comments-thumbnail.html">Blog Comments</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Single Post<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="blog-image-post.html">Image Post</a></li>
                                                        <li><a href="blog-video-post.html">Video Post</a></li>
                                                        <li><a href="blog-gallery-post.html">Gallery Post</a></li>
                                                        <li><a href="blog-sidebar-post.html">Sidebar Post</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="right"><a href="#">Shop</a> <span class="arrow"></span>
                                            <ul>
                                                <li><a href="#">Default<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shop-full-width.html">Full Width</a></li>
                                                        <li><a href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Grids <span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shop-2-columns.html">Two Column</a></li>
                                                        <li><a href="shop-3-columns.html">Three Column</a></li>
                                                        <li><a href="shop-4-columns.html">Four Column</a></li>
                                                        <li><a href="shop-5-columns.html">Five Column</a></li>
                                                        <li><a href="shop-6-columns.html">Six Column</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Single Product<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shop-single-full-width.html">Full Width</a></li>
                                                        <li><a href="shop-single-left-sidebar.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="shop-single-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                        <li><a href="shop-single-both-sidebar.html">both Sidebars</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Order Process<span class="sub-arrow dark pull-right"><i
                                                                    class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></span> </a> <span
                                                            class="arrow"></span>
                                                    <ul>
                                                        <li><a href="shop-cart.html">Shoping Cart</a></li>
                                                        <li><a href="shop-checkout.html">Checkout</a></li>
                                                        <li><a href="shop-wishlist.html">Wishlist</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end menu-->

    </div>
    <!--end menu-->

    <div class="clearfix"></div>

    <!-- START REVOLUTION SLIDER 5.0 -->
    <div class="slide-tmargin">
        <div class="slidermaxwidth">
            <div class="rev_slider_wrapper">
                <!-- START REVOLUTION SLIDER 5.0 auto mode -->
                <div id="rev_slider" class="rev_slider" data-version="5.0">
                    <ul>

                        <!-- SLIDE  -->
                        <li data-index="rs-1" data-transition="fade">

                            <!-- MAIN IMAGE -->
                            <img src="http://via.placeholder.com/2000x1300" alt="" width="1920" height="1280">

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
                                 style="z-index: 7; white-space: nowrap;">onsectetuer adipiscing elit sit amet justo
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
                                 style="z-index: 7; white-space: nowrap;">Creative & Modern
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
                                 style="z-index: 7; white-space: nowrap;">Agency Studio
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sbut2 btn-round"
                                 data-x="['center','center','center','center']"
                                 data-hoffset="['-100','-100','-120','0']"
                                 data-y="['top','top','top','top']" data-voffset="['550','350','370','300']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6"><a href="#">Get Started now!</a></div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sbut5 btn-round"
                                 data-x="['center','center','center','center']" data-hoffset="['120','120','140','0']"
                                 data-y="['top','top','top','top']" data-voffset="['550','350','370','370']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6"><a href="#">Purchase now!</a></div>
                        </li>

                        <!-- SLIDE  -->
                        <li data-index="rs-2" data-transition="slideleft">

                            <!-- MAIN IMAGE -->
                            <img src="http://via.placeholder.com/2000x1300" alt="" width="1920" height="1280">

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
                                 style="z-index: 7; white-space: nowrap;">onsectetuer adipiscing elit sit amet justo
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
                                 style="z-index: 7; white-space: nowrap;">Beautifully
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
                                 style="z-index: 7; white-space: nowrap;">Crafted Designs
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sbut2 btn-round"
                                 data-x="['center','center','center','center']"
                                 data-hoffset="['-100','-100','-120','0']"
                                 data-y="['top','top','top','top']" data-voffset="['550','350','370','300']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6"><a href="#">Get Started now!</a></div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sbut5 btn-round"
                                 data-x="['center','center','center','center']" data-hoffset="['120','120','140','0']"
                                 data-y="['top','top','top','top']" data-voffset="['550','350','370','370']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6"><a href="#">Purchase now!</a></div>
                        </li>

                        <!-- SLIDE  -->
                        <li data-index="rs-3" data-transition="slideleft">

                            <!-- MAIN IMAGE -->
                            <img src="http://via.placeholder.com/2000x1300" alt="" width="1920" height="1280">

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
                                 style="z-index: 7; white-space: nowrap;">onsectetuer adipiscing elit sit amet justo
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
                                 style="z-index: 7; white-space: nowrap;">We are Creating
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
                                 style="z-index: 7; white-space: nowrap;">Beautiful Designs
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sbut2 btn-round"
                                 data-x="['center','center','center','center']"
                                 data-hoffset="['-100','-100','-120','0']"
                                 data-y="['top','top','top','top']" data-voffset="['550','350','370','300']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6"><a href="#">Get Started now!</a></div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sbut5 btn-round"
                                 data-x="['center','center','center','center']" data-hoffset="['120','120','140','0']"
                                 data-y="['top','top','top','top']" data-voffset="['550','350','370','370']"
                                 data-speed="800"
                                 data-start="2500"
                                 data-transform_in="y:bottom;s:1500;e:Power3.easeOut;"
                                 data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;"
                                 data-endspeed="300"
                                 data-captionhidden="off"
                                 style="z-index: 6"><a href="#">Purchase now!</a></div>
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
                                <h5 class="title font-weight-5 text-white">Classic Styles</h5>
                                <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                    faucibus orci luctus ultrices posuere cubilia Curae.</p>
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
                    <div class="ce-feature-box-30"><img src="http://via.placeholder.com/1000x1060" alt=""/></div>
                </div>
                <!--end item-->

                <div class="col-md-6 margin-bottom">
                    <div class="ce-feature-box-29">
                        <div class="col-sm-12">
                            <div class="sec-title-container less-padding-4 text-left">
                                <h2 class="font-weight-6 less-mar-1 text-white line-height-5">We offer high Quality Home
                                    Pages for You</h2>
                                <h6 class="raleway opacity-8 align-left text-white">Praesent mattis commodo augue
                                    Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus .</h6>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--end title-->

                        <div class="col-md-6">
                            <div class="ce-feature-box-32 text-left">
                                <div class="icon-plain-msmall left white icon center"><span class="pe-7s-mouse"></span>
                                </div>
                                <div class=" text-box text-left">
                                    <h5 class="title font-weight-5 text-white">Beautiful Graphics</h5>
                                    <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                        faucibus orci luctus.</p>
                                </div>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-6">
                            <div class="ce-feature-box-32 text-left">
                                <div class="icon-plain-msmall left white icon center"><span class="pe-7s-look"></span>
                                </div>
                                <div class=" text-box text-left">
                                    <h5 class="title font-weight-5 text-white">Classic Styles</h5>
                                    <p class="text-white opacity-8">Vestibulum ante ipsum primis sit amet justo elit
                                        faucibus orci luctus.</p>
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
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar
                                    lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
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
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar
                                    lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
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
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar
                                    lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-6">
                        <div class="ce-feature-box-15 text-left">
                            <div class="icon-plain-medium left dark icon"><i class="pe-7s-mouse"></i></div>
                            <div class="text-box-right">
                                <h5 class="title font-weight-5">Excellent Customer Support</h5>
                                <p>Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras tellus In pulvinar
                                    lectus a est Curabitur eget orci Cras laoreet ligula Etiam sit amet.</p>
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
    <!-- end section -->


    <section class="sec-padding section-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec-title-container text-center">
                        <h5 class="font-weight-4 less-mar-1 line-height-4 montserrat opacity-9">We are creating
                            beautiful Products</h5>
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
                        <div class="cbp-item web-design graphic"><a href="http://via.placeholder.com/300x300"
                                                                    class="cbp-caption cbp-lightbox"
                                                                    data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"><img src="http://via.placeholder.com/300x300"
                                                                          alt=""></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="cbp-item print motion"><a href="http://via.placeholder.com/300x300"
                                                              class="cbp-caption cbp-lightbox"
                                                              data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"><img src="http://via.placeholder.com/300x300"
                                                                          alt=""></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="cbp-item print motion"><a href="http://via.placeholder.com/300x300"
                                                              class="cbp-caption cbp-lightbox"
                                                              data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"><img src="http://via.placeholder.com/300x300"
                                                                          alt=""></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="cbp-item motion graphic"><a href="http://via.placeholder.com/300x300"
                                                                class="cbp-caption cbp-lightbox"
                                                                data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"><img src="http://via.placeholder.com/300x300"
                                                                          alt=""></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="cbp-item web-design print"><a href="http://via.placeholder.com/300x300"
                                                                  class="cbp-caption cbp-lightbox"
                                                                  data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"><img src="http://via.placeholder.com/300x300"
                                                                          alt=""></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="cbp-item print motion"><a href="http://via.placeholder.com/300x300"
                                                              class="cbp-caption cbp-lightbox"
                                                              data-title="Bolt UI<br>by Tiberiu Neamu">
                                <div class="cbp-caption-defaultWrap"><img src="http://via.placeholder.com/300x300"
                                                                          alt=""></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Lorem ipsum dolor sit</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->


    <section class="section-dark">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-md-6 nopadding">
                    <div class="col-md-6 nopadding">
                        <div class="ce-feature-box-34"><img src="http://via.placeholder.com/300x300" alt=""/></div>
                    </div>
                    <!--end item-->

                    <div class="col-md-6 nopadding">
                        <div class="ce-feature-box-33">
                            <h5 class="text-white opacity-7">Praesent mattis</h5>
                            <h4 class="text-white">Praesent mattis commodo augue </h4>
                            <p>sectetuer adipiscing elit sit amet Suspendisse et justo Praesent mattis commodo augue
                                Aliquam ornare .</p>
                            <br/>
                            <a class="btn btn-dark btn-round btn-medium uppercase" href="#"><i class="fa fa-play-circle"
                                                                                               aria-hidden="true"></i>
                                Read more</a></div>
                    </div>
                    <!--end item-->

                </div>
                <!--end item-->

                <div class="col-md-6 nopadding">
                    <div class="col-md-6 nopadding">
                        <div class="ce-feature-box-34"><img src="http://via.placeholder.com/300x300" alt=""/></div>
                    </div>
                    <!--end item-->

                    <div class="col-md-6 nopadding">
                        <div class="ce-feature-box-33">
                            <h5 class="text-white opacity-7">Praesent mattis</h5>
                            <h4 class="text-white">Praesent mattis commodo augue </h4>
                            <p>sectetuer adipiscing elit sit amet Suspendisse et justo Praesent mattis commodo augue
                                Aliquam ornare .</p>
                            <br/>
                            <a class="btn btn-dark btn-round btn-medium uppercase" href="#"><i class="fa fa-play-circle"
                                                                                               aria-hidden="true"></i>
                                Read more</a></div>
                    </div>
                    <!--end item-->

                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->


    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="rev_slider_wrapper fullscreen-container" data-alias="agency-website"
                     id="rev_slider_280_1_wrapper" style="background-color:#222222;padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.1.4 fullscreen mode -->
                    <div class="rev_slider fullscreenbanner" data-version="5.1.4" id="rev_slider_280_1"
                         style="display:none;">
                        <ul>
                            <!-- SLIDE  -->
                            <li data-description="" data-easein="Power2.easeInOut" data-easeout="default"
                                data-index="rs-898" data-masterspeed="2000" data-param1="" data-param10=""
                                data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                                data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                                data-slotamount="default" data-title="Slide" data-transition="fade">
                                <!-- MAIN IMAGE -->
                                <img alt="" class="rev-slidebg" data-bgparallax="3" data-bgposition="center center"
                                     data-duration="30000" data-ease="Linear.easeNone" data-kenburns="off"
                                     data-no-retina="" data-offsetend="0 0" data-offsetstart="0 0" data-rotateend="0"
                                     data-rotatestart="0" data-scaleend="100" data-scalestart="140"
                                     src="http://via.placeholder.com/2000x1300">
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption tp-shape tp-shapewrapper" data-basealign="slide"
                                     data-height="full" data-hoffset="['0','0','0','0']" data-responsive="off"
                                     data-responsive_offset="off" data-start="0" data-transform_idle="o:1;"
                                     data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;"
                                     data-transform_out="opacity:0;s:500;s:500;" data-voffset="['0','0','0','0']"
                                     data-whitespace="nowrap" data-width="full"
                                     data-x="['center','center','center','center']"
                                     data-y="['middle','middle','middle','middle']" id="slide-898-layer-1"
                                     style="z-index: 5;background-color:rgba(0, 0, 0, 0.15);border-color:rgba(0, 0, 0, 0);"></div>
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption tp-shape tp-shapewrapper" data-basealign="slide"
                                     data-end="bytrigger" data-height="full" data-hoffset="['0','0','0','0']"
                                     data-lasttriggerstate="reset" data-responsive="off" data-responsive_offset="off"
                                     data-start="bytrigger" data-transform_idle="o:1;"
                                     data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;"
                                     data-transform_out="opacity:0;s:500;s:500;" data-voffset="['0','0','0','0']"
                                     data-whitespace="nowrap" data-width="full"
                                     data-x="['center','center','center','center']"
                                     data-y="['middle','middle','middle','middle']" id="slide-898-layer-19"
                                     style="z-index: 6;background-color:rgba(0, 0, 0, 0.75);border-color:rgba(0, 0, 0, 0);"></div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption ce-text-1 text-white montserrat tp-resizeme"
                                     data-fontsize="['50','60','40','30']"
                                     data-height="none" data-hoffset="['0','0','0','0']"
                                     data-lineheight="['70','70','50','50']" data-mask_in="x:0px;y:0px;"
                                     data-responsive_offset="on" data-splitin="none" data-splitout="none"
                                     data-start="1250" data-transform_idle="o:1;"
                                     data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power3.easeInOut;"
                                     data-transform_out="opacity:0;s:300;s:300;"
                                     data-voffset="['250','250','170','170']"
                                     data-whitespace="nowrap" data-width="none"
                                     data-x="['center','center','center','center']" data-y="['top','top','top','top']"
                                     id="slide-898-layer-2"
                                     style="z-index: 8; white-space: nowrap;"> We are modern, Creative
                                </div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption ce-text-1 text-white tp-resizeme"
                                     data-fontsize="['50','60','40','30']"
                                     data-height="none" data-hoffset="['0','0','0','0']"
                                     data-lineheight="['70','70','50','50']" data-mask_in="x:0px;y:0px;"
                                     data-responsive_offset="on" data-splitin="none" data-splitout="none"
                                     data-start="1250" data-transform_idle="o:1;"
                                     data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power3.easeInOut;"
                                     data-transform_out="opacity:0;s:300;s:300;"
                                     data-voffset="['320','320','240','240']"
                                     data-whitespace="nowrap" data-width="none"
                                     data-x="['center','center','center','center']" data-y="['top','top','top','top']"
                                     style="z-index: 8; white-space: nowrap;"> and digital <span
                                            class="text-primary font-weight-3">Agency</span></div>

                                <!-- LAYER NR. 6 -->
                                <div class="tp-caption btn-style-2 Agency-PlayBtn rev-btn tp-resizeme"
                                     data-actions='[{"event":"mouseenter","action":"startlayer","layer":"slide-898-layer-18","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-898-layer-18","delay":""},{"event":"click","action":"startlayer","layer":"slide-898-layer-15","delay":""},{"event":"click","action":"startlayer","layer":"slide-898-layer-19","delay":""},{"event":"click","action":"startlayer","layer":"slide-898-layer-20","delay":"1000"},{"event":"click","action":"playvideo","layer":"slide-898-layer-15","delay":"1000"}]'
                                     data-height="none" data-hoffset="['20','0','0','0']" data-responsive_offset="on"
                                     data-splitin="none" data-splitout="none" data-start="2000"
                                     data-style_hover="c:rgba(255, 255, 255, 1.00);"
                                     data-transform_hover="o:1;sX:1.1;sY:1.1;rX:0;rY:0;rZ:0;z:0;s:500;e:Power1.easeInOut;"
                                     data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Power3.easeInOut;"
                                     data-transform_out="opacity:0;s:300;s:300;" data-voffset="['150','90','60','80']"
                                     data-whitespace="nowrap" data-width="75"
                                     data-x="['center','center','center','center']" data-y="['top','top','top','top']"
                                     id="slide-898-layer-17"
                                     style="z-index: 10; min-width: 75px; max-width: 75px; white-space: nowrap;text-align:center;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;color:#000;">
                                    <i class="fa fa-play"></i></div>

                                <!-- LAYER NR. 10 -->
                                <div class="tp-caption tp-resizeme tp-videolayer" data-autoplay="off"
                                     data-end="bytrigger" data-hoffset="['0','0','0','0']" data-lasttriggerstate="reset"
                                     data-responsive_offset="on" data-start="bytrigger" data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                     data-transform_out="auto:auto;s:300;"
                                     data-videoattributes="title=0&byline=0&portrait=0&api=1"
                                     data-videoheight="['400px','405px','270px','203px']" data-videoloop="none"
                                     data-videowidth="['960px','720px','480px','360px']" data-vimeoid="142874198"
                                     data-voffset="['0','0','0','0']" data-volume="100" data-whitespace="nowrap"
                                     data-x="['center','center','center','center']"
                                     data-y="['middle','middle','middle','middle']" id="slide-898-layer-15"
                                     style="z-index: 14;"></div>
                                <!-- LAYER NR. 11 -->
                                <div class="tp-caption Agency-CloseBtn rev-btn"
                                     data-actions='[{"event":"click","action":"stoplayer","layer":"slide-898-layer-15","delay":""},{"event":"click","action":"stoplayer","layer":"slide-898-layer-19","delay":""},{"event":"click","action":"stoplayer","layer":"slide-898-layer-20","delay":""}]'
                                     data-end="bytrigger" data-height="none" data-hoffset="['480','389','270','199']"
                                     data-lasttriggerstate="reset" data-responsive="off" data-responsive_offset="on"
                                     data-splitin="none" data-splitout="none" data-start="bytrigger"
                                     data-style_hover="c:rgba(255, 255, 255, 1.00);"
                                     data-transform_hover="o:1;sX:1.1;sY:1.1;rX:0;rY:0;rZ:0;z:0;s:500;e:Power1.easeInOut;"
                                     data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:45deg;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:500;e:Power3.easeInOut;"
                                     data-transform_out="auto:auto;s:500;" data-voffset="['-220','-229','-163','-118']"
                                     data-whitespace="nowrap" data-width="50"
                                     data-x="['center','center','center','center']"
                                     data-y="['middle','middle','middle','middle']" id="slide-898-layer-20"
                                     style="z-index: 15; min-width: 50px; max-width: 50px; white-space: nowrap;text-align:center;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                    <i class="fa fa-times" aria-hidden="true"></i></div>
                            </li>
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                    </div>
                </div>
                <!-- END REVOLUTION SLIDER -->

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
                        <div class="icon-plain-medium icon center text-primary"><span
                                    class="pe-7s-monitor text-primary"></span></div>
                        <br/>
                        <h3 class="font-weight-4">Shortcodes</h3>
                        <p>Pellentesque ut risus a odio posuere aliquet. Pellentesque sapien erat, dignissim vel,
                            faucibus eget, vulputate eget, nulla.</p>
                        <br/>
                        <br/>
                        <a class="btn btn-border light border-1x btn-xround-2 uppercase" href="#"><i
                                    class="fa fa-play-circle" aria-hidden="true"></i> Read more</a></div>
                </div>
                <!--end item-->

                <div class="col-md-4">
                    <div class="ce-feature-box-3 text-center">
                        <div class="icon-plain-medium icon center text-primary"><span
                                    class="pe-7s-folder text-primary"></span></div>
                        <br/>
                        <h3 class="font-weight-4">PSD Files</h3>
                        <p>Pellentesque ut risus a odio posuere aliquet. Pellentesque sapien erat, dignissim vel,
                            faucibus eget, vulputate eget, nulla.</p>
                        <br/>
                        <br/>
                        <a class="btn btn-prim btn-xround-2 uppercase" href="#"><i class="fa fa-play-circle"
                                                                                   aria-hidden="true"></i> Read more</a>
                    </div>
                </div>
                <!--end item-->

                <div class="col-md-4">
                    <div class="ce-feature-box-3 text-center">
                        <div class="icon-plain-medium icon center text-primary"><span
                                    class="pe-7s-search text-primary"></span></div>
                        <br/>
                        <h3 class="font-weight-4">Creative Layouts</h3>
                        <p>Pellentesque ut risus a odio posuere aliquet. Pellentesque sapien erat, dignissim vel,
                            faucibus eget, vulputate eget, nulla.</p>
                        <br/>
                        <br/>
                        <a class="btn btn-border border-1x btn-xround-2 light uppercase" href="#"><i
                                    class="fa fa-play-circle" aria-hidden="true"></i> Read more</a></div>
                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->

    <div class="divider-line solid light-2"></div>
    <section class="section-light">
        <div class="container">
            <div class="row sec-padding hl-more-top-padd">
                <div class="tab-navbar-main tabstyle-13">
                    <ul class="responsive-tabs">
                        <li><a href="#example-1-tab-1" target="_self"> Monthly</a></li>
                        <li><a href="#example-1-tab-2" target="_self"> Yearly</a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 nopadding"></div>
                    <div class="clearfix"></div>
                    <div class="tab-content-holder-13">
                        <div class="responsive-tabs-content">
                            <div id="example-1-tab-1" class="responsive-tabs-panel">
                                <div class="responsive-tab-title ttitle dark"></div>
                                <div class="clearfix"></div>
                                <br/>
                                <div class="col-md-12 col-centered text-center"><br/>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="ce-price-table-3 margin-bottom">
                                            <div class="border-box">
                                                <div class="inner-box text-center">
                                                    <h3 class="less-mar-1 font-weight-6 title montserrat">Free</h3>
                                                    <br/>
                                                    <div class="price-circle">
                                                        <div class="price"><sup>$</sup>0</div>
                                                        <br/>
                                                        <span>Lifetime</span></div>
                                                    <br/>
                                                    <ul class="plan_features">
                                                        <li>One user</li>
                                                        <li>10 GB Disk Space</li>
                                                        <li class="highlight">Free Domain</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <a class="btn btn-border light btn-xround btn-medium uppercase"
                                                       href="#"><i class="fa fa-play-circle" aria-hidden="true"></i>
                                                        Order now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end item-->

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="ce-price-table-3 active margin-bottom">
                                            <div class="border-box">
                                                <div class="inner-box text-center">
                                                    <h3 class="less-mar-1 font-weight-6 title montserrat">Standard</h3>
                                                    <br/>
                                                    <div class="price-circle">
                                                        <div class="price"><sup>$</sup>49</div>
                                                        <br/>
                                                        <span>/Month</span></div>
                                                    <br/>
                                                    <ul class="plan_features">
                                                        <li> Up to 10 user</li>
                                                        <li>50 GB Disk Space</li>
                                                        <li class="highlight"> 2 Free Domain</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <a class="btn btn-prim btn-xround btn-medium uppercase" href="#"><i
                                                                class="fa fa-play-circle" aria-hidden="true"></i> Order
                                                        now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end item-->

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="ce-price-table-3 margin-bottom">
                                            <div class="border-box">
                                                <div class="inner-box text-center">
                                                    <h3 class="less-mar-1 font-weight-6 title montserrat">Business</h3>
                                                    <br/>
                                                    <div class="price-circle">
                                                        <div class="price"><sup>$</sup>79</div>
                                                        <br/>
                                                        <span>/Month</span></div>
                                                    <br/>
                                                    <ul class="plan_features">
                                                        <li> Unlimited user</li>
                                                        <li>250 GB Disk Space</li>
                                                        <li class="highlight"> Unlimited Domain</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <a class="btn btn-border light btn-xround btn-medium uppercase"
                                                       href="#"><i class="fa fa-play-circle" aria-hidden="true"></i>
                                                        Order now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end item-->

                                </div>
                                <!--end item-->

                            </div>
                            <!--end panel 1-->

                            <div id="example-1-tab-2" class="responsive-tabs-panel">
                                <div class="responsive-tab-title ttitle dark"></div>
                                <div class="clearfix"></div>
                                <br/>
                                <div class="col-md-12 col-centered text-center"><br/>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="ce-price-table-3 margin-bottom">
                                            <div class="border-box">
                                                <div class="inner-box text-center">
                                                    <h3 class="less-mar-1 font-weight-6 title montserrat">Free</h3>
                                                    <br/>
                                                    <div class="price-circle">
                                                        <div class="price"><sup>$</sup>0</div>
                                                        <br/>
                                                        <span>Lifetime</span></div>
                                                    <br/>
                                                    <ul class="plan_features">
                                                        <li>One user</li>
                                                        <li>10 GB Disk Space</li>
                                                        <li class="highlight">Free Domain</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <a class="btn btn-border light btn-xround btn-medium uppercase"
                                                       href="#"><i class="fa fa-play-circle" aria-hidden="true"></i>
                                                        Order now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end item-->

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="ce-price-table-3 active margin-bottom">
                                            <div class="border-box">
                                                <div class="inner-box text-center">
                                                    <h3 class="less-mar-1 font-weight-6 title montserrat">Standard</h3>
                                                    <br/>
                                                    <div class="price-circle">
                                                        <div class="price"><sup>$</sup>99</div>
                                                        <br/>
                                                        <span>/Year</span></div>
                                                    <br/>
                                                    <ul class="plan_features">
                                                        <li> Up to 10 user</li>
                                                        <li>50 GB Disk Space</li>
                                                        <li class="highlight"> 2 Free Domain</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <a class="btn btn-prim btn-xround btn-medium uppercase" href="#"><i
                                                                class="fa fa-play-circle" aria-hidden="true"></i> Order
                                                        now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end item-->

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="ce-price-table-3 margin-bottom">
                                            <div class="border-box">
                                                <div class="inner-box text-center">
                                                    <h3 class="less-mar-1 font-weight-6 title montserrat">Business</h3>
                                                    <br/>
                                                    <div class="price-circle">
                                                        <div class="price"><sup>$</sup>499</div>
                                                        <br/>
                                                        <span>/Year</span></div>
                                                    <br/>
                                                    <ul class="plan_features">
                                                        <li> Unlimited user</li>
                                                        <li>250 GB Disk Space</li>
                                                        <li class="highlight"> Unlimited Domain</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <a class="btn btn-border light btn-xround btn-medium uppercase"
                                                       href="#"><i class="fa fa-play-circle" aria-hidden="true"></i>
                                                        Order now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end item-->

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
    <!-- end section -->

    <section class="section-primary">
        <div class="container-fluid"></div>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-md-7 col-sm-12 col-xs-12 margin-bottom"><img src="http://via.placeholder.com/1500x1100"
                                                                             alt="" class="img-responsive"/></div>
                <!--end item-->

                <div class="col-md-5 sec-padding">
                    <div class="col-md-8">
                        <h2 class="ce-sec-title font-weight-6 less-mar-1 text-white">Build Modern, creative and clean
                            templates</h2>
                        <br/>
                        <h5 class="raleway text-white">Lorem ipsum dolor sit amet consectetuer adipiscing elit
                            Suspendisse et justo .</h5>
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
                        <a class="btn btn-white btn-round uppercase" href="#"><i class="fa fa-play-circle"
                                                                                 aria-hidden="true"></i> Read more</a>
                    </div>
                </div>
                <!--end item-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->

    <div class="parallax vertical-align" data-parallax-bg-image="http://via.placeholder.com/2000x1300"
         data-parallax-speed="0.9" data-parallax-direction="down">
        <div class="parallax-overlay bg-opacity-8">
            <div class="container sec-tpadding-2 sec-bpadding-2">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sec-title-container text-left">
                            <h2 class="font-weight-6 less-mar-1 line-height-5 text-white">Know more about our
                                company<br/>
                                <span class="font-weight-3 text-white">and get unlimited features</span></h2>
                            <h6 class="ce-sub-text raleway align-left text-white opacity-3">Praesent mattis commodo
                                augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget
                                orci Cras laoreet ligula etiam sit amet dolor Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae.</h6>
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
                            <h5 class="font-weight-4 less-mar-1 line-height-4 opacity-9">Our creative team gives you
                                best Support</h5>
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
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/></div>
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
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/></div>
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
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/></div>
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
                                <img src="http://via.placeholder.com/500x600" alt="" class="img-responsive"/></div>
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
                    <h3 class="less-mar-1 font-weight-4 line-height-4 text-white">We offer high Quality Templates and
                        Detailed digital Works </h3>
                    <p class="text-white opacity-6">Praesent mattis commodo augue Aliquam ornare hendrerit augue Cras
                        tellus In pulvinar. </p>
                    <div class="clearfix"></div>
                    <br/>
                    <a class="btn btn-white btn-round uppercase" href="#"><i class="fa fa-play-circle"
                                                                             aria-hidden="true"></i> Get Started</a>
                    &nbsp;&nbsp; <a class="btn btn-border white btn-round uppercase" href="#"><i
                                class="fa fa-play-circle" aria-hidden="true"></i> View more</a></div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--end section-->

    <section class="sec-padding section-pattren-25">
        <div class="container">
            <div class="row slide-controls-4">
                <div class="col-sm-12">
                    <div class="sec-title-container text-center">
                        <h5 class="font-weight-4 less-mar-1 line-height-4 montserrat opacity-9">What our people and
                            clients says</h5>
                        <h2 class="font-weight-6 less-mar-1 montserrat line-height-5">Our Customers and people Says<br/>
                            we deliver quality products </h2>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--end title-->

                <div id="owl-demo3" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="col-md-4">
                            <div class="ce-feature-box-19 margin-bottom">
                                <div class="text-box text-center">
                                    <div class="imgbox-xlarge round center overflow-hidden img"><img
                                                src="http://via.placeholder.com/200x200" alt="" class="img-responsive"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="quote-icon"><img src="images/29.png" alt="" class="img-responsive"/>
                                    </div>
                                    <p>Elit odio erat vel eget consectetuer adipiscing elit Suspendisse et justo
                                        Praesent mattis commodo.</p>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <h5 class="less-mar-1 title montserrat">Margaret</h5>
                                    <span class="text-primary">Manager</span></div>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="ce-feature-box-19 margin-bottom">
                                <div class="text-box text-center">
                                    <div class="imgbox-xlarge round center overflow-hidden img"><img
                                                src="http://via.placeholder.com/200x200" alt="" class="img-responsive"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="quote-icon"><img src="images/29.png" alt="" class="img-responsive"/>
                                    </div>
                                    <p>Elit odio erat vel eget consectetuer adipiscing elit Suspendisse et justo
                                        Praesent mattis commodo.</p>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <h5 class="less-mar-1 title montserrat">Matthew</h5>
                                    <span class="text-primary">Developer</span></div>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="ce-feature-box-19 margin-bottom">
                                <div class="text-box text-center">
                                    <div class="imgbox-xlarge round center overflow-hidden img"><img
                                                src="http://via.placeholder.com/200x200" alt="" class="img-responsive"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="quote-icon"><img src="images/29.png" alt="" class="img-responsive"/>
                                    </div>
                                    <p>Elit odio erat vel eget consectetuer adipiscing elit Suspendisse et justo
                                        Praesent mattis commodo.</p>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <h5 class="less-mar-1 title montserrat">Nicholas</h5>
                                    <span class="text-primary">Designer</span></div>
                            </div>
                        </div>
                        <!--end item-->
                    </div>
                    <!--end carousel item-->

                    <div class="item">
                        <div class="col-md-4">
                            <div class="ce-feature-box-19 margin-bottom">
                                <div class="text-box text-center">
                                    <div class="imgbox-xlarge round center overflow-hidden img"><img
                                                src="http://via.placeholder.com/200x200" alt="" class="img-responsive"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="quote-icon"><img src="images/29.png" alt="" class="img-responsive"/>
                                    </div>
                                    <p>Elit odio erat vel eget consectetuer adipiscing elit Suspendisse et justo
                                        Praesent mattis commodo.</p>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <h5 class="less-mar-1 title montserrat">Margaret</h5>
                                    <span class="text-primary">Manager</span></div>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="ce-feature-box-19 margin-bottom">
                                <div class="text-box text-center">
                                    <div class="imgbox-xlarge round center overflow-hidden img"><img
                                                src="http://via.placeholder.com/200x200" alt="" class="img-responsive"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="quote-icon"><img src="images/29.png" alt="" class="img-responsive"/>
                                    </div>
                                    <p>Elit odio erat vel eget consectetuer adipiscing elit Suspendisse et justo
                                        Praesent mattis commodo.</p>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <h5 class="less-mar-1 title montserrat">Matthew</h5>
                                    <span class="text-primary">Developer</span></div>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-4">
                            <div class="ce-feature-box-19 margin-bottom">
                                <div class="text-box text-center">
                                    <div class="imgbox-xlarge round center overflow-hidden img"><img
                                                src="http://via.placeholder.com/200x200" alt="" class="img-responsive"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="quote-icon"><img src="images/29.png" alt="" class="img-responsive"/>
                                    </div>
                                    <p>Elit odio erat vel eget consectetuer adipiscing elit Suspendisse et justo
                                        Praesent mattis commodo.</p>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <h5 class="less-mar-1 title montserrat">Nicholas</h5>
                                    <span class="text-primary">Designer</span></div>
                            </div>
                        </div>
                        <!--end item-->
                    </div>
                    <!--end carousel item-->

                </div>
                <!--end carousel main-->
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->

    <section class="sec-padding section-bgimg-12">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec-title-container text-center">
                        <h5 class="font-weight-4 less-mar-1 line-height-4 text-white">Our blogs and news help you to
                            success</h5>
                        <h2 class="font-weight-6 less-mar-1 line-height-5 text-white">Our blogs help you to success
                            <br/>
                            your business and goals</h2>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--end title-->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="ce-feature-box-57">
                        <div class="img-box"><img src="http://via.placeholder.com/1000x800" alt=""
                                                  class="img-responsive"/></div>
                        <div class="postinfo-box">
                            <h3 class="title font-weight-4"><a href="#">Aliquam justo Hendrerit </a></h3>
                            <div class="blog-post-info"><span><i class="fa fa-folder"></i> Business/corporate</span>
                            </div>
                            <br/>
                            <p class="small-text">Consectetuer adipiscing elit Suspendisse et justo Praesent mattis
                                commodo augue. </p>
                        </div>
                        <!--end post item-->
                    </div>
                </div>
                <!--end col main-->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="ce-feature-box-57">
                        <div class="img-box"><img src="http://via.placeholder.com/1000x800" alt=""
                                                  class="img-responsive"/></div>
                        <div class="postinfo-box">
                            <h3 class="title font-weight-4"><a href="#">Praesent elit commodo </a></h3>
                            <div class="blog-post-info"><span><i class="fa fa-folder"></i> Business/corporate</span>
                            </div>
                            <br/>
                            <p class="small-text">Consectetuer adipiscing elit Suspendisse et justo Praesent mattis
                                commodo augue. </p>
                        </div>
                        <!--end post item-->
                    </div>
                </div>
                <!--end col main-->

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="ce-feature-box-57">
                        <div class="img-box"><img src="http://via.placeholder.com/1000x800" alt=""
                                                  class="img-responsive"/></div>
                        <div class="postinfo-box">
                            <h3 class=" title font-weight-4"><a href="#">Duis felis elit scelerisque</a></h3>
                            <div class="blog-post-info"><span><i class="fa fa-folder"></i> Business/corporate</span>
                            </div>
                            <br/>
                            <p class="small-text">Consectetuer adipiscing elit Suspendisse et justo Praesent mattis
                                commodo augue. </p>
                        </div>
                        <!--end post item-->
                    </div>
                </div>
                <!--end col main-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->

    <section class="sec-padding section-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <input class="ba-newsletter" type="search" placeholder="Your Name">
                    <input class="ba-newsletter-email" type="search" placeholder="Email Address">
                    <input name="search" value="Subscribe" class="ba-newsletter-btn" type="submit">
                </div>
                <!--end newsletter-->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->




@endsection