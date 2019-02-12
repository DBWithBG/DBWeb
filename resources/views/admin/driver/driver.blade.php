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

                @if($driver->is_op)
                <!-- Begin row (Statistiques) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Historique</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                      <thead>
                                        <tr>
                                          <th class="disabled-sorting">Mois</th>
                                          <th class="disabled-sorting">Nombre de courses</th>
                                          <th class="disabled-sorting">Nombre de bagages</th>
                                          <th class="disabled-sorting">Gain</th>
                                          <th class="disabled-sorting text-right">Facture</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        @foreach ($historique as $month)
                                        <tr>
                                            <td>{{Config::get('constants.MONTH_' . $month['month']) . ' ' .$month['year']}}</td>
                                            <td>{{$month['nb_deliveries']}}</td>
                                            <td>{{$month['nb_bags']}}</td>
                                            <td>{{$month['income'] . '€'}}</td>
                                            <td class="text-right">
                                                <!-- Pas de facture pour le mois en cours -->
                                                <a href="{{url(sprintf('backoffice/driver/%d/facture/%d/%d', $driver->id, $month['year'], $month['month']))}}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">dvr</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                      </tbody>
                                    </table>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end row (Statistiques) -->


                <!-- Begin row (Informations) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Informations</h4>
                                </div>
                            </div>
                            <form method="post" action="{{url('/backoffice/driver/' . $driver->id . '/update')}}">
                                <div class="card-body">
                                    @if($driver->is_op)
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Statut</label>
                                            <div style="padding-top: 14px" class="text-success col-sm-10">
                                                Ce chauffeur est validé.
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Statut</label>
                                            <div style="padding-top: 14px" class="text-danger col-sm-10">
                                                Ce chauffeur n'est pas validé.
                                            </div>
                                        </div>
                                    @endif

                                    {{csrf_field()}}

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Note</label>
                                        <div style="padding-top: 14px" class="col-sm-10">
                                            {{$driver->note()}}
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Nom</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input required type="text" name="name" class="form-control"
                                                       value="{{$driver->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Prénom</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input required type="text" name="surname" class="form-control"
                                                       value="{{$driver->surname}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Adresse mail</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input required type="email" name="email" class="form-control"
                                                       value="{{$driver->user->email}}">
                                            </div>
                                        </div>
                                        <div style="padding-top: 22px" class="col-sm-2">
                                            @if($driver->user->is_confirmed)
                                                <span class="text-success">Vérifiée</span>
                                            @else
                                                <span class="text-danger">Non vérifiée</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Téléphone</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="tel" name="phone" class="form-control"
                                                       value="{{$driver->phone}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">SIRET</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" name="siret" class="form-control"
                                                       value="{{$driver->siret}}">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-fill btn-primary">Sauvegarder</button>
                                    @if(!$driver->is_op)
                                        <button onclick="event.preventDefault(); document.getElementById('validate_driver').submit()" class="btn btn-success">Valider ce chauffeur</button>
                                    @else
                                        <button onclick="event.preventDefault(); document.getElementById('revoke_driver').submit()" type="submit" class="btn btn-danger">Invalider ce chauffeur</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row (Informations) -->

                <form style="display: none;" id="validate_driver" method="post"
                      action="{{url('/backoffice/driver/'. $driver->id .'/validate')}}">
                    {{csrf_field()}}

                </form>
                <form style="display: none;" id="revoke_driver" method="post"
                      action="{{url('/backoffice/driver/'. $driver->id .'/revoke')}}">
                    {{csrf_field()}}

                </form>

                <!-- Begin row (PJ) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Pièces justificatives</h4>
                                </div>

                            </div>

                            <div class="card-body">

                                @if($driver->justificatifs->count() > 0)
                                    <div class="material-datatables">
                                        <table class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead class="text-center">
                                            <tr>
                                                <th class="text-left">Nom</th>
                                                <th class="text-left">Statut</th>
                                                <th class="disabled-sorting"></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($driver->justificatifs as $justificatif)
                                                <tr class="text-center">
                                                    <td class="text-left"><a
                                                                href="{{url('/driver/viewJustificatif/' . $justificatif->id)}}">{{ $justificatif->name }}</a>
                                                    </td>
                                                    <td class="text-left {{$justificatif->is_valide !== null && !$justificatif->is_valide ? 'text-danger' : ''}} {{$justificatif->is_valide !== null && $justificatif->is_valide ? 'text-success' : ''}}">{{ $justificatif->is_valide === null ? 'En attente de vérification' : ($justificatif->is_valide ? 'Vérifiée' : 'Non valide') }}</td>
                                                    <td class="text-right">

                                                        <form style="display: inline" method="post"
                                                              action="{{url('/backoffice/driver/' . $driver->id . '/validateJustificatif/' . $justificatif->id)}}">
                                                            {{ csrf_field() }}
                                                            <button type="submit"
                                                                    class="btn btn-link btn-success btn-just-icon remove"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Marquer comme valide"><i
                                                                        class="material-icons">done</i></button>
                                                        </form>


                                                        <form style="display: inline" method="post"
                                                              action="{{url('/backoffice/driver/' . $driver->id . '/revokeJustificatif/' . $justificatif->id)}}">
                                                            {{ csrf_field() }}
                                                            <button type="submit"
                                                                    class="btn btn-link btn-warning btn-just-icon remove"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Marquer comme non valide"><i
                                                                        class="material-icons">close</i></button>
                                                        </form>


                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h5>Aucune pièce justificative</h5>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row (PJ) -->

            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script type="text/javascript" src="{{asset('material_dashboard/assets/js/plugins/jquery.datatables.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#datatables').DataTable({
                // Désactivation du trie automatique
                "aaSorting": [],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [3, 10, 25, -1],
                    [3, 10, 25, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Recherche",
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