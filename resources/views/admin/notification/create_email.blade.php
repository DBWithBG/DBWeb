@extends('admin.layouts.app')


@section('content')


    @include('admin.layouts.sideBarre')
    <div class="main-panel">

        @include('admin.layouts.topBarre')


        <div class="content">
            <div class="container-fluid">
                @if(isset($errors))
                    @foreach ($errors->all() as $error)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger">{{$error}}</div>

                            </div>
                        </div>
                    @endforeach
                @endif

                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="row">
                        <div class="col-md-12">
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
                                    <h4 class="card-title">Envoyer une notification</h4>
                                </div>
                            </div>
                            <form id="add_etablissement_form" method="POST" action="{{url('/backoffice/push/email')}}"
                                  class="form-horizontal">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>

                                    <h3>A qui voulez-vous envoyer l'email de masse ?</h3>
                                    <div class="col-md-12">

                                        <div class="form-check col-md-3">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="customer"
                                                       value="1">
                                                Clients
                                                <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                                            </label>
                                        </div>
                                        <div class="form-check col-md-3">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="driver"
                                                       value="1">
                                                Chauffeurs
                                                <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Sujet de l'email</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input required type="text" name="subject" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Contenu de l'email</label>
                                            <textarea id="bodyField" name="html"></textarea>

                                            @ckeditor('bodyField', ['height' => 300])
                                        </div>
                                    </div>

                                </div><!-- end content-->
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-fill btn-success">Envoyer</button>
                                </div>
                            </form>
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div>
                <!-- end row (liste groupes)-->
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function ($) {
            // Gestion de l'input "Veuillez préciser" (désactivé sauf quand "Autre" est check)
            $('.form-check-input').click(function () {
                $('#veuillez_preciser_input').prop('disabled', true);
            });

            $('#autre_input').click(function () {
                $('#veuillez_preciser_input').prop('disabled', false);
            });


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