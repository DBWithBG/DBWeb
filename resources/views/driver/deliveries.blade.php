@extends('driver.layouts.app')

@section('content')

    @include('driver.layouts.sideBarre')
    <div class="main-panel">

        @include('driver.layouts.topBarre')

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
                                    <h4 class="card-title">Courses en cours</h4>
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
                                            <th>Commentaire</th>
                                            <th>Position de départ</th>
                                            <th>Position d'arrivée</th>
                                            <th>Date de création</th>
                                            <th>Prix</th>
                                            <th>Client</th>
                                            <th>Statut</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($take_over_deliveries as $tod)
                                            <tr class="text-center">

                                                <td>{{$tod->delivery->comment }}</td>
                                                <td>{{$tod->delivery->startPosition->address}}</td>
                                                <td>{{$tod->delivery->endPosition->address}}</td>
                                                <td>{{ \Carbon\Carbon::parse($tod->delivery->created_at)->format('d/m/Y') }}</td>
                                                <td>{{$tod->delivery->price}} €</td>
                                                <td>
                                                    <a href="{{url('/backoffice/customer/'. $tod->delivery->customer->id )}}">{{ $tod->delivery->customer->surname .'-' . $tod->delivery->customer->name}}</a>
                                                </td>
                                                <td>
                                                    @if(empty($tod->delivery->takeOverDelivery))
                                                        En recherche de chauffeur
                                                    @else
                                                        {{\Illuminate\Support\Facades\Config::get('constants.STATUS_'.$tod->delivery->status, $tod->delivery->status)}}
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <form id="delete_groupe_form_{{ $tod->delivery->id }}" method="post"
                                                          action="{{url('/backoffice/driver/delete')}}">
                                                        <input type="hidden" name="id" value="{{ $tod->delivery->id }}">
                                                        {{ csrf_field() }}
                                                    </form>
                                                    <button onclick="if(confirm('Êtes-vous sûr de vouloir supprimer cette course ?')) { document.getElementById('delete_groupe_form_{{ $tod->delivery->id }}').submit(); }"
                                                            class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                class="material-icons">close</i></button>
                                                    <a href="{{url('/driver/litiges/' . $tod->delivery->id)}}"><i class="material-icons">warning</i></a>
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