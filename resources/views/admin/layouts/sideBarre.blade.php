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

                <li class="nav-item {{ Request::is('backoffice/customer*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{url('backoffice/customers')}}">
                        <i class="material-icons">people</i>
                        <p> Clients

                        </p>
                    </a>
                </li>


                <li class="nav-item {{ Request::is('backoffice/driver*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{url('backoffice/drivers')}}">
                        <i class="material-icons">directions_car</i>
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

                    <div class="collapse {{ Request::is('backoffice/deliveries/*') ? 'show' : '' }}"
                         id="etablissementsCollapse">
                        <ul class="nav">
                            <li class="nav-item {{ Request::is('backoffice/deliveries/inProgress') ? 'active' : '' }}">
                                <a class="nav-link" href="{{url('backoffice/deliveries/inProgress')}}">
                                    <span class="sidebar-mini">  EC </span>
                                    <span class="sidebar-normal"> en cours</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('backoffice/deliveries/past') ? 'active' : '' }}">
                                <a class="nav-link" href="{{url('backoffice/deliveries/past')}}">
                                    <span class="sidebar-mini">  PA</span>
                                    <span class="sidebar-normal"> passées</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('backoffice/deliveries/upComing') ? 'active' : '' }}">
                                <a class="nav-link" href="{{url('backoffice/deliveries/upComing')}}">
                                    <span class="sidebar-mini">  AV </span>
                                    <span class="sidebar-normal"> à venir</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#disputesCollapse">
                        <i class="material-icons">grid_on</i>
                        <p> Disputes
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse {{ Request::is('backoffice/disputes_*') ? 'show' : '' }}"
                         id="disputesCollapse">
                        <ul class="nav">
                            <li class="nav-item {{ Request::is('backoffice/disputes_ouvertes') ? 'active' : '' }}">
                                <a class="nav-link" href="{{url('backoffice/disputes_ouvertes')}}">
                                    <span class="sidebar-mini">  DO </span>
                                    <span class="sidebar-normal"> Ouvertes</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('backoffice/disputes_fermees') ? 'active' : '' }}">
                                <a class="nav-link" href="{{url('backoffice/disputes_fermees')}}">
                                    <span class="sidebar-mini">  DF</span>
                                    <span class="sidebar-normal"> Fermées</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#formulairesCollapse">
                        <i class="material-icons">content_paste</i>
                        <p> Notifications et mails
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse {{ Request::is('backoffice/notification*') ? 'show' : '' }}"
                         id="formulairesCollapse">
                        <ul class="nav">
                            <li class="nav-item {{ Request::is('backoffice/notification*') ? 'active' : '' }}">
                                <a class="nav-link" href="#informations_row">
                                    <span class="sidebar-mini"> NO </span>
                                    <span class="sidebar-normal"> Notification </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('backoffice/mail*') ? 'active' : '' }}">
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

                    <div class="collapse {{ Request::is('backoffice/facturation*') ? 'show' : '' }}"
                         id="facturationCollapse">
                        <ul class="nav">
                            <li class="nav-item {{ Request::is('backoffice/facturation/client*') ? 'active' : '' }}">
                                <a class="nav-link" href="#informations_row">
                                    <span class="sidebar-mini"> IN </span>
                                    <span class="sidebar-normal"> Clients </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('backoffice/facturation/chauffeur*') ? 'active' : '' }}">
                                <a class="nav-link" href="#proprietaire_row">
                                    <span class="sidebar-mini"> CH </span>
                                    <span class="sidebar-normal"> Chauffeur </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#configurationCollapse">
                        <i class="material-icons">content_paste</i>
                        <p> Configuration
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse {{ Request::is('backoffice/configuration*') ? 'show' : '' }}"
                         id="configurationCollapse">
                        <ul class="nav">
                            <li class="nav-item {{ Request::is('backoffice/configuration/department*') ? 'active' : '' }}">
                                <a class="nav-link " href="{{url('backoffice/configuration/departments')}}">
                                    <i class="material-icons">grid_on</i>
                                    <p> Départements autorisés
                                    </p>
                                </a>

                            </li>
                            <li class="nav-item {{ Request::is('backoffice/configuration/typeBagage*') ? 'active' : '' }}">
                                <a class="nav-link " href="{{url('backoffice/configuration/typeBagages')}}">
                                    <i class="material-icons">grid_on</i>
                                    <p> Type de bagages
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



            </ul>
        </div>
    </div>
@endif

