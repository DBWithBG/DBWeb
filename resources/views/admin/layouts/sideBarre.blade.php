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
                DELIVERBAG ADMIN
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

                <li class="nav-item ">
                    <a class="nav-link collapse" data-toggle="collapse" href="#groupesCollapse">
                        <i class="material-icons">dashboard</i>
                        <p> Clients
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="groupesCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ url('/clients') }}">
                                    <span class="sidebar-mini"> TS </span>
                                    <span class="sidebar-normal"> Tous les clients </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item ">
                    <a class="nav-link " data-toggle="collapse" href="#etablissementsCollapse">
                        <i class="material-icons">grid_on</i>
                        <p> Chauffeurs
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="etablissementsCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ url('/dossiers/' . $groupe->id) }}">
                                    <span class="sidebar-mini"> TS </span>
                                    <span class="sidebar-normal"> Tous les établissements </span>
                                </a>
                            </li>
                            @foreach($groupe->Etablissements as $etab)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/etablissements/' . $etab->id) }}">
                                        <span class="sidebar-mini"> ET </span>
                                        <span class="sidebar-normal"> {{ $etab->nom }} </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
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
                                <a class="nav-link" href="{{ url('/dossiers/' . $etablissement->groupe->id) }}">
                                    <span class="sidebar-mini"> TS </span>
                                    <span class="sidebar-normal"> Tous les établissements </span>
                                </a>
                            </li>
                            @foreach($etablissement->groupe->Etablissements as $etab)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/etablissements/' . $etab->id) }}">
                                        <span class="sidebar-mini"> ET </span>
                                        <span class="sidebar-normal"> {{ $etab->nom }} </span>
                                    </a>
                                </li>
                            @endforeach
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
                                    <span class="sidebar-mini"> IN </span>
                                    <span class="sidebar-normal"> Informations </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#proprietaire_row">
                                    <span class="sidebar-mini"> PR </span>
                                    <span class="sidebar-normal"> Propriétaire </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#organisme_row">
                                    <span class="sidebar-mini"> OR </span>
                                    <span class="sidebar-normal"> Organisme </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#formulairesCollapse">
                        <i class="material-icons">content_paste</i>
                        <p> Facturation
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="formulairesCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#informations_row">
                                    <span class="sidebar-mini"> IN </span>
                                    <span class="sidebar-normal"> Clients </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#proprietaire_row">
                                    <span class="sidebar-mini"> PR </span>
                                    <span class="sidebar-normal"> Propriétaire </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#organisme_row">
                                    <span class="sidebar-mini"> OR </span>
                                    <span class="sidebar-normal"> Organisme </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#formulairesCollapse">
                        <i class="material-icons">content_paste</i>
                        <p> Litiges
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="formulairesCollapse">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#informations_row">
                                    <span class="sidebar-mini"> IN </span>
                                    <span class="sidebar-normal"> Informations </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#proprietaire_row">
                                    <span class="sidebar-mini"> PR </span>
                                    <span class="sidebar-normal"> Propriétaire </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#organisme_row">
                                    <span class="sidebar-mini"> OR </span>
                                    <span class="sidebar-normal"> Organisme </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
@endif

