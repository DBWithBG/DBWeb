@extends('customer.layouts.app')

@section('content')

    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Vos bagages enregistés</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li><a href="{{url('/profil')}}">Profil</a></li>
                            <li class="current"><a href="{{url('/bagages')}}">Vos bagages</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    @if($errors->any())
        <div style="margin-top: 10px" class="container">
            @foreach($errors->all() as $error)
                <div class="row">

                    <div class="col-md-12 nopadding">
                        <div class="alert-box danger">
                                    <span class="alert-closebtn"
                                          onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong>
                            &nbsp; {{$error}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <!--end section-->

    <section class="sec-padding section-light">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12 col-xs-12">

                    <h3 class="uppercase">Ajouter un bagages</h3>
                    <p>Ajouter un bagages à votre profil vous permettra de commander des courses plus rapidement.</p>
                    <br/>
                    <br/>

                    <div class="text-box white padding-4">
                        <div class="smartforms-modal-body">
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container transparent wrap-full">
                                    <div class="form-body no-padd">
                                        <form method="post" action="{{url('/addBagage')}}" id="smart-form">

                                            {{csrf_field()}}

                                            <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                 class="section">
                                                <label class="field prepend-icon">
                                                    <input required type="text" name="name" id="name"
                                                           class="gui-input" placeholder="Nom du bagages">
                                                    <span class="field-icon"><i
                                                                class="fa fa-shopping-basket"></i></span>
                                                </label>
                                            </div><!-- end section -->

                                            <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                 class="section">
                                                <label class="field prepend-icon">
                                                    <input required type="text" name="details"
                                                           id="details" class="gui-input"
                                                           placeholder="Détails">
                                                    <span class="field-icon"><i
                                                                class="fa fa-shopping-basket"></i></span>
                                                </label>
                                            </div><!-- end section -->

                                            <div style="padding-bottom: 0px !important; padding-top: 0px !important;" class="section">

                                                @foreach(\App\TypeBag::all() as $type)
                                                <div class="radio-inline">
                                                    <label><input type="radio" name="type" value="{{$type->id}}">{{$type->name}}</label>
                                                </div>
                                                @endforeach
                                            </div><!-- end section -->


                                            <div class="result"></div><!-- end .result  section -->

                                            <!-- end .form-body section -->
                                            <div class="form-footer text-left">
                                                <button type="submit" data-btntext-sending="Sending..."
                                                        class="button btn-primary">Enregistrer
                                                </button>
                                            </div><!-- end .form-footer section -->
                                        </form>
                                    </div><!-- end .form-body section -->
                                </div><!-- end .smart-forms section -->
                            </div><!-- end .smart-wrap section -->
                        </div>
                    </div><!-- end .smart-wrap section -->
                    <!-- end .smart-forms section -->
                </div>
                <!--end item-->

                @include('customer.layouts.profilRightMenu')


            </div>
        </div>
    </section>

    <section class="section-light">
        <div class="container">
            <div class="row">
                <h3 class="uppercase">Vos bagages</h3>
                <br/>
                <br/>
                <div class="domain-pricing-table">
                    <table id="datatable_en_cours" class="table-style-2">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Détails</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bags as $bag)
                            <tr>
                                <td>{{$bag->name}}</td>
                                <td>{{$bag->details}}</td>
                                <td>{{$bag->type->name}}</td>
                                <td>
                                    <form action="{{url('/deleteBagage/' . $bag->id)}}" method="post" id="delete_bagage_{{$bag->id}}">
                                        {{csrf_field()}}
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete_bagage_{{$bag->id}}').submit()">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->





@endsection

@section('custom-scripts')
    <script src="{{asset('material_dashboard/assets/js/plugins/jquery.datatables.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {

            var bags = $("#datatable_bags");

            bags.DataTable({
                dom: 'Bfrtip',
                "ordering": false,
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ], language: {
                    "sProcessing": "Traitement en cours...",
                    "sSearch": "Rechercher&nbsp;:",
                    "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix": "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sPrevious": "Pr&eacute;c&eacute;dent",
                        "sNext": "Suivant",
                        "sLast": "Dernier"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                    }
                }
            });
        });


    </script>
@endsection