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
                                    <h4 class="card-title">Chauffeurs</h4>
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
                                            <th>Prénom - Nom</th>
                                            <th>Date d'anniversaire</th>
                                            <th>Téléphone</th>
                                            <th>Inscrit le</th>
                                            <th>CA</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($drivers as $driver)
                                            <tr class="text-center">
                                                <td>
                                                    <a href="{{url('/backoffice/driver/'. $driver->id )}}">{{ $driver->surname .'-' . $driver->name}}</a>
                                                </td>
                                                <td>{{ $driver->birth_date }}</td>
                                                <td>{{$driver->phone}}</td>
                                                <td>{{ \Carbon\Carbon::parse($driver->created_at)->format('d/m/Y') }}</td>
                                                <td>0 €</td>
                                                <td class="text-right">
                                                    <form id="delete_groupe_form_{{ $driver->id }}" method="post"
                                                          action="{{url('/backoffice/driver/delete')}}">
                                                        <input type="hidden" name="id" value="{{ $driver->id }}">
                                                        {{ csrf_field() }}
                                                    </form>
                                                    <button onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur ?')) { document.getElementById('delete_groupe_form_{{ $driver->id }}').submit(); }"
                                                            class="btn btn-link btn-danger btn-just-icon remove"><i
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