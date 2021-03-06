@extends('customer.layouts.app')

@section('content')

    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>{{trans('historique.historiqueCourses')}}</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">{{trans('historique.accueil')}}</a></li>
                            <li><a href="{{url('/profil')}}">{{trans('historique.profil')}}</a></li>
                            <li class="current"><a href="{{url('/historique')}}">{{trans('historique.historique')}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--end section-->

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <h3 class="uppercase">{{trans('historique.coursesc')}}</h3>
                <br/>
                <br/>
                <div class="domain-pricing-table">
                    <table id="datatable_en_cours" class="table-style-2">
                        <thead>
                        <tr>
                            <th>{{trans('historique.datecrea')}}</th>
                            <th>{{trans('historique.statut')}}</th>
                            <th>{{trans('historique.depart')}}</th>
                            <th>{{trans('historique.arrivee')}}</th>
                            <th>{{trans('historique.informations')}}</th>
                            <th>{{trans('historique.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries->where('status', '!=', \Illuminate\Support\Facades\Config::get('constants.TERMINE')) as $delivery)
                            <tr>
                                <td>{{date('d / m / y', strtotime($delivery->created_at))}}</td>
                                <td>
                                    {{\Illuminate\Support\Facades\Config::get('constants.STATUS_' . $delivery->status)}}
                                    @if($delivery->status == Config::get('constants.NON_FINALISE'))
                                        <br><a href="{{url('/delivery/' . $delivery->id . '/save')}}">{{trans('historique.finaliser')}}</a>
                                    @endif
                                </td>
                                <td>{{$delivery->startPosition->address}}</td>
                                <td>{{$delivery->endPosition->address}}</td>
                                <td>{{trans('historique.distance')}} : {{$delivery->distance}} km<br>
                                    {{trans('historique.prix')}} : {{$delivery->price}} €</td>
                                <td>
                                <!--<a data-toggle="modal" data-target="#modal_comment_{{$delivery->id}}"
                                       class="text-warning" href="#">Commentaire</a>-->
                                    <button class="btn btn-link" onclick="modal_comment({{$delivery->id}})">{{trans('historique.commentaire')}}</button>
                                    @if($delivery->takeOverDelivery != null && \Carbon\Carbon::parse($delivery->start_date)->addDays(1) > Carbon\Carbon::now())
                                        <a href="{{url('/litiges/' . $delivery->id)}}">{{trans('historique.litiges')}}</a>
                                    @endif
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

    <section>
        <div class="container">
            <div class="row">
                <h3 class="uppercase">{{trans('historique.coursesend')}}</h3>
                <br/>
                <br/>
                <div class="domain-pricing-table">
                    <table id="datatable_terminees" class="table-style-2">
                        <thead>
                        <tr>
                            <th>{{trans('historique.datecrea')}}</th>
                            <th>{{trans('historique.statut')}}</th>
                            <th>{{trans('historique.depart')}}</th>
                            <th>{{trans('historique.arrivee')}}</th>
                            <th>{{trans('historique.informations')}}</th>
                            <th>{{trans('historique.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries->where('status', '=', \Illuminate\Support\Facades\Config::get('constants.TERMINE')) as $delivery)
                            <tr>
                                <td>{{date('d / m / y', strtotime($delivery->created_at))}}</td>
                                <td>{{$delivery->status}}</td>
                                <td>{{$delivery->startPosition->address}}</td>
                                <td>{{$delivery->endPosition->address}}</td>
                                <td>{{trans('historique.distance')}} : {{$delivery->distance}} km<br>
                                    {{trans('historique.prix')}} : {{$delivery->price}} €</td>
                                <td>
                                    <!--<a data-toggle="modal" data-target="#modal_rate_{{$delivery->id}}"
                                       class="text-warning" href="#">Noter</a>-->
                                    <button class="btn btn-link" onclick="modal_rating({{$delivery->id}})">{{trans('historique.noter')}}</button>
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

    <div class="modal fade" id="generic_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div id="modal-content" class="modal-content">
            </div>
        </div>
    </div>




@endsection

@section('custom-scripts')
    <script src="{{asset('material_dashboard/assets/js/plugins/jquery.datatables.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {

            var table_en_cours = $("#datatable_en_cours");
            var table_terminees = $("#datatable_terminees");

            table_en_cours.DataTable({
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
            table_terminees.DataTable({
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


        function modal_comment(id) {
            $.get('{{url('/modalComment/')}}' + '/' + id, function (data) {
                var modalContent = $('#modal-content');
                modalContent.html(data);
                var generic_modal = $('#generic_modal');
                generic_modal.modal('show');
            });
        }

        function modal_rating(id) {
            $.get('{{url('/modalRating/')}}' + '/' + id, function (data) {
                var modalContent = $('#modal-content');
                modalContent.html(data);
                var generic_modal = $('#generic_modal');
                generic_modal.modal('show');
                $('.kv-fa').rating({
                    filledStar: '<i class="fa fa-star"></i>',
                    emptyStar: '<i class="fa fa-star-o"></i>',
                    showCaption: false,
                    showRemove: false,
                    showCancel: false,
                    showClose: false,
                    showClear: false
                });
            });
        }
    </script>
@endsection