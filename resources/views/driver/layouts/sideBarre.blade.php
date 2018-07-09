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
                BACKOFFICE DRIVER
            </a>

        </div>

        <div class="sidebar-wrapper">

            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('driver/home')}}">
                        <i class="material-icons">class</i>
                        <p> Mon profil</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link"  href="{{url('driver/courses')}}">
                        <i class="material-icons">people</i>
                        <p> Historique courses

                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link"  href="{{url('driver/invoices')}}">
                        <i class="material-icons">people</i>
                        <p> Facturation

                        </p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
@endif

