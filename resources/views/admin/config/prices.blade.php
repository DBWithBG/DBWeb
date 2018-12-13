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

                <div id="add_salle_row" class="row" >
                    <div class="col-md-10">
                        <div class="card">
                            <form id="add_salle_form"
                                  action="{{ url('/backoffice/configuration/addPrice') }}"
                                  method="post" class="form-horizontal">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-text">
                                        <h4 class="card-title">Ajouter calcul de prix pour une plage de nombre de bagages</h4>
                                    </div>

                                </div>
                                <div class="js-hide card-body">

                                    <input type="hidden" name="createur" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Bagages minimum (borne incluse) :</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" name="bags_min" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Bagages maximum (borne incluse) : </label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" name="bags_max" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>Pour le calcul de la rémunération du driver : </h3>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Nombre à additionner au début de l'équation :</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" step="0.000001" name="to_add_driver" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Coefficient devant la racine du nombre de kilomètres :</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" step="0.000001" name="coef_kilometers_driver" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Coefficient devant la racine du nombre min de bagages :</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" step="0.000001" name="coef_bags_driver" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Coefficient multipliant le tout :</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" step="0.000001" name="coef_total_driver" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>Pour le calcul de la rémunération de deliverbag</h3>
                                    <div class="row">
                                        <label class="col-sm-5 col-form-label">Coefficient multipliant la rémunération driver :</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input required type="number" step="0.000001" name="coef_deliver" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-fill btn-success">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" id="rowPrices">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Prix en cours</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <div class="material-datatables">

                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                           cellspacing="0" width="100%" style="width:100%">
                                        <thead class="text-center">
                                        <tr>
                                            <th>Plage nombre de bagages</th>
                                            <th>Formule prix driver</th>
                                            <th>Coef rémunération deliverbag</th>
                                            <th>Créateur</th>
                                            <th>Créé le</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($prices as $price)
                                            <tr class="text-center price-{{$price->id}}">
                                                <td>
                                                    De {{ $price->bags_min }} à {{ $price->bags_max }}
                                                </td>
                                                <td>
                                                    ({{ $price->to_add_driver }} + {{ $price->coef_kilometers_driver }} * RACINE(KILOMETRES) *({{ $price->coef_bags_driver }} * RACINE({{$price->bags_min}})) * {{ $price->coef_total_driver }}
                                                </td>
                                                <td>
                                                    {{ number_format($price->coef_deliver, 6) }}
                                                </td>
                                                <td>
                                                    {{ $price->createur }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($price->created_at)->format('d/m/Y') }}
                                                </td>

                                                <td class="text-right">

                                                    <button data-idPrice="{{$price->id}}"
                                                            class="delete btn btn-link btn-danger btn-just-icon remove">
                                                        <i
                                                                class="material-icons">close</i></button>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div>
                <!-- end row (liste groupes)-->

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

            var id = $(this).attr("data-idPrice");
            $.ajax({
                type: "POST",
                url: '{{url('/backoffice/configuration/deletePrice')}}',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                success: function (response) {
                    $('.price-' + id).hide();
                    swal({
                        position: 'top-right',
                        type: 'success',
                        title: 'Suppression du price  Ok',
                        showConfirmButton: false,
                        timer: 2500
                    })


                }

            });

        });

    </script>
@endsection