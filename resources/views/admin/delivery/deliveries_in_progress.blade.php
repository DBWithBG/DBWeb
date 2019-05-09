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
                                            <th>Prix</th>
                                            <th>Bagages</th>
                                            <th>Départ</th>
                                            <th>Arrivée</th>
                                            <th>Retour</th>
                                            <th>Distance (en km)</th>
                                            <th>Date de création</th>
                                            <th>Client</th>
                                            <th>Statut</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($deliveries as $delivery)
                                            <tr class="text-center delivery-{{$delivery->id}}">

                                                <td>{{ $delivery->comment }}</td>
                                                <td>{{$delivery->price}} € </td>
                                                <td>
                                                    @if($delivery->nb_bags == 0)
                                                        @foreach($delivery->bagsWithTypes() as $key => $bagWithType)
                                                            {{$bagWithType}} {{$key}}
                                                        @endforeach
                                                    @else
                                                        {{$delivery->nb_bags}}
                                                    @endif

                                                </td>
                                                <td>{{$delivery->startPosition->address}}<br>
                                                    <strong>{{date('d/m/y H:i', strtotime($delivery->start_date))}}</strong>
                                                </td>
                                                <td>{{$delivery->endPosition->address}}<br>
                                                    @if($delivery->time_consigne == NULL)
                                                        <strong>IMMEDIAT</strong>
                                                    @else
                                                        <strong>{{date('d/m/y H:i', strtotime($delivery->end_date))}}</strong>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!empty($delivery->date_retour))
                                                        {{date('d/m/y H:i', strtotime($delivery->date_retour))}}
                                                    @endif
                                                </td>
                                                <td>{{$delivery->distance}} km ({{$delivery->estimated_time}}min)</td>
                                                <td>{{ \Carbon\Carbon::parse($delivery->created_at)->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href="{{url('/backoffice/customer/'. $delivery->customer->id )}}">{{ $delivery->customer->surname .'-' . $delivery->customer->name}}</a>
                                                </td>
                                                <td>
                                                    @if(empty($delivery->takeOverDelivery))
                                                        En recherche de chauffeur
                                                    @else
                                                        {{$delivery->takeOverDelivery->status}}
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <button data-idDelivery="{{$delivery->id}}"
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
        $(document).ready(function ($) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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

            $('.delete').on('click', function () {

                var id = $(this).attr("data-idDelivery");
                $.ajax({
                    type: "POST",
                    url: '{{url('backoffice/deliveries/delete')}}',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    success: function (response) {
                        $('.delivery-' + id).hide();
                        swal({
                            position: 'top-right',
                            type: 'success',
                            title: 'Suppression de la course ' + response.id + ' Ok',
                            showConfirmButton: false,
                            timer: 2500
                        })


                    }

                });

            });
        });
    </script>
@endsection