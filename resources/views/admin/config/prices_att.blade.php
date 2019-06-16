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

                <div id="add_salle_row" class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <form id="add_salle_form"
                                  action="{{ url('/backoffice/configuration/addPrice/old') }}"
                                  method="post" class="form-horizontal">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-text">
                                        <h4 class="card-title">Ajouter un prix site web</h4>
                                    </div>

                                </div>
                                <div class="card-body">


                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Prix par bagage :</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" step="0.01" name="price_per_bag" value="{{$price->price_per_bag}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Prix par bagage au retour:</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" step="0.01" name="price_ret_per_bag" value="{{$price->price_ret_per_bag}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Départements correspondant au prix:</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <textarea required name="postal_code" value="{{$price->price_ret_per_bag}}" class="form-control">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{ csrf_field() }}

                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-fill btn-success">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- End row (ajouter groupe)-->

            </div>
            <!-- End container-fluid -->
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script type="text/javascript">

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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

        $('.delete').on('click', function () {

            var id = $(this).attr("data-idDepartment");
            $.ajax({
                type: "POST",
                url: '{{url('/backoffice/configuration/deleteDepartment')}}',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                success: function (response) {
                    $('.department-' + id).hide();
                    swal({
                        position: 'top-right',
                        type: 'success',
                        title: 'Suppression du département ' + response.name + ' Ok',
                        showConfirmButton: false,
                        timer: 2500
                    })


                }

            });

        });

    </script>
@endsection