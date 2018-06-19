@extends('admin.layouts.app')

@section('content')

    @include('admin.layouts.sideBarre')
    <div class="main-panel">

        @include('admin.layouts.topBarre')

        <div class="content">
            <div class="container-fluid">
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-md-10">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="row">
                        <div class="col-md-10">
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        </div>
                    </div>
                @endif


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Informations</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($driver->is_op)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="text-success">Ce chauffeur est validé.</h5>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="text-danger">Ce chauffeur n'est pas validé.</h5>
                                        </div>
                                    </div>
                                @endif
                                <div style="margin-top: 15px" class="row">
                                    <div class="col-md-2"><strong>Nom</strong></div>
                                    <div class="col-md-3">{{$driver->name}}</div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"><strong>Prénom</strong></div>
                                    <div class="col-md-3">{{$driver->surname}}</div>

                                </div>
                                <div style="margin-top: 20px" class="row">
                                    <div class="col-md-2"><strong>Adresse email</strong></div>
                                    <div class="col-md-3">{{$driver->user->email}}</div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"><strong>SIRET</strong></div>
                                    <div class="col-md-3">{{$driver->siret}}</div>
                                </div>
                                <div style="margin-top: 20px" class="row">
                                    <div class="col-md-2"><strong>Téléphone</strong></div>
                                    <div class="col-md-3">{{$driver->phone}}</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                @if(!$driver->is_op)
                                    <form method="post" action="{{url('http://localhost:8888/backoffice/driver/3/validate')}}">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-success">Valider ce chauffeur</button>
                                    </form>
                                @else
                                    <form method="post" action="{{url('http://localhost:8888/backoffice/driver/3/revoke')}}">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger">Invalider ce chauffeur</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function ($) {
            var $table4 = $("#datatables");

            $table4.DataTable({
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