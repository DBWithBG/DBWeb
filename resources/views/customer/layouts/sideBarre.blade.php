@if(\Illuminate\Support\Facades\Auth::check())
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">

            </a>

            <a href="{{url('/')}}" class="simple-text logo-normal">
                BACKOFFICE
            </a>

        </div>


        <div class="sidebar-wrapper">

            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link">
                        <i class="material-icons">class</i>
                        <p> {{  \Illuminate\Support\Facades\Auth::user()->name }} </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  href="{{url('backoffice/customers')}}">
                        <i class="material-icons">people</i>
                        <p> Clients

                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link " href="{{url('backoffice/drivers')}}">
                        <i class="material-icons">grid_on</i>
                        <p> Chauffeurs
                        </p>
                    </a>

                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#etablissementsCollapse">
                        <i class="material-icons">grid_on</i>
                        <p> Courses
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="etablissementsCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('backoffice/deliveries/inProgress')}}">
                                    <span class="sidebar-mini">  EC </span>
                                    <span class="sidebar-normal"> en cours</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('backoffice/deliveries/past')}}">
                                    <span class="sidebar-mini">  PA</span>
                                    <span class="sidebar-normal"> passées</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('backoffice/deliveries/upComing')}}">
                                    <span class="sidebar-mini">  AV </span>
                                    <span class="sidebar-normal"> à venir</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#formulairesCollapse">
                        <i class="material-icons">content_paste</i>
                        <p> Notifications et mails
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="formulairesCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#informations_row">
                                    <span class="sidebar-mini"> NO </span>
                                    <span class="sidebar-normal"> Notification </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#proprietaire_row">
                                    <span class="sidebar-mini"> MA </span>
                                    <span class="sidebar-normal"> Mails </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#facturationCollapse">
                        <i class="material-icons">content_paste</i>
                        <p> Facturation
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="facturationCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#informations_row">
                                    <span class="sidebar-mini"> IN </span>
                                    <span class="sidebar-normal"> Clients </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#proprietaire_row">
                                    <span class="sidebar-mini"> CH </span>
                                    <span class="sidebar-normal"> Chauffeur </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{url('backoffice/disputes')}}">
                        <i class="material-icons">grid_on</i>
                        <p> Litiges
                        </p>
                    </a>

                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{url('backoffice/disputes')}}">
                        <i class="material-icons">grid_on</i>
                        <p> Litiges
                        </p>
                    </a>

                </li>
            </ul>
        </div>
    </div>
@endif

