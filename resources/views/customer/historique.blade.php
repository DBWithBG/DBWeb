@extends('customer.layouts.app')

@section('content')

    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Historique de vos courses</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li><a href="{{url('/profil')}}">Profil</a></li>
                            <li class="current"><a href="{{url('/historique')}}">Historique</a></li>
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
                <h3 class="uppercase">Courses en cours</h3>
                <br/>
                <br/>
                <div class="domain-pricing-table">
                    <table id="datatable_en_cours" class="table-style-2">
                        <thead>
                        <tr>
                            <th>Date de création</th>
                            <th>Statut</th>
                            <th>Distance</th>
                            <th>Prix</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries->where('status', '!=', \Illuminate\Support\Facades\Config::get('constants.TERMINE')) as $delivery)
                            <tr>
                                <td>{{date('d / m / y', strtotime($delivery->created_at))}}</td>
                                <td>{{\Illuminate\Support\Facades\Config::get('constants.STATUS_' . $delivery->status)}}</td>
                                <td>{{$delivery->distance}} km</td>
                                <td>{{$delivery->price}} €</td>
                                <td><a data-toggle="modal" data-target="#modal_comment_{{$delivery->id}}"
                                       class="text-warning" href="#">Commentaire</a></td>
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
                <h3 class="uppercase">Courses terminées</h3>
                <br/>
                <br/>
                <div class="domain-pricing-table">
                    <table id="datatable_terminees" class="table-style-2">
                        <thead>
                        <tr>
                            <th>Date de création</th>
                            <th>Statut</th>
                            <th>Distance</th>
                            <th>Prix</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries->where('status', '=', \Illuminate\Support\Facades\Config::get('constants.TERMINE')) as $delivery)
                            <tr>
                                <td>{{date('d / m / y', strtotime($delivery->created_at))}}</td>
                                <td>{{$delivery->status}}</td>
                                <td>{{$delivery->distance}} km</td>
                                <td>{{$delivery->price}} €</td>
                                <td><a data-toggle="modal" data-target="#modal_rate_{{$delivery->id}}"
                                       class="text-warning" href="#">Noter</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>


    @foreach($deliveries as $delivery)
        <div class="modal fade" id="modal_comment_{{$delivery->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Laisser un commentaire</h5>
                    </div>
                    <form method="post" action="{{url('/comment')}}">
                        <div class="modal-body">
                            <div style="min-height: 110px" class="smart-wrap">
                                <div class="smart-forms smart-container transparent wrap-full">
                                    <div class="form-body no-padd">


                                        {{csrf_field()}}

                                        <input type="hidden" name="delivery_id" value="{{$delivery->id}}">

                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                             class="section">
                                            <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="comment"
                                                                          name="comment"
                                                                          placeholder="Votre commentaire">{{$delivery->comment}}</textarea>
                                                <span class="field-icon"><i class="fa fa-comments"></i></span>
                                            </label>
                                        </div><!-- end section -->


                                        <div class="result"></div><!-- end .result  section -->


                                    </div><!-- end .form-body section -->
                                </div><!-- end .smart-forms section -->
                            </div><!-- end .smart-wrap section -->
                        </div>
                        <div class="modal-footer smart-forms">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="button btn-primary">Commenter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($takeOverDeliveries as $delivery)
        <div class="modal fade" id="modal_rate_{{$delivery->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Noter cette course</h5>
                    </div>
                    <form method="post" action="{{url('/rate')}}">
                        <div class="modal-body">
                            <div style="min-height: 150px" class="smart-wrap">
                                <div class="smart-forms smart-container transparent wrap-full">
                                    <div class="form-body no-padd">


                                        {{csrf_field()}}

                                        <input type="hidden" name="delivery_id" value="{{$delivery->id}}">

                                        <input value="{{($delivery->rating != null ? $delivery->rating->rating / 10 : 0)}}" style="padding-bottom: 20px" name="rating" type="text" class="kv-fa rating-loading" data-size="md" >


                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                             class="section">
                                            <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="comment"
                                                                          name="comment"
                                                                          placeholder="Votre commentaire">{{($delivery->rating != null ? $delivery->rating->details : '')}}</textarea>
                                                <span class="field-icon"><i class="fa fa-comments"></i></span>
                                            </label>
                                        </div><!-- end section -->


                                        <div class="result"></div><!-- end .result  section -->


                                    </div><!-- end .form-body section -->
                                </div><!-- end .smart-forms section -->
                            </div><!-- end .smart-wrap section -->
                        </div>
                        <div class="modal-footer smart-forms">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="button btn-primary">Noter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach



@endsection

@section('custom-scripts')
    <script src="{{asset('material_dashboard/assets/js/plugins/jquery.datatables.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {

            $('.kv-fa').rating({
                filledStar: '<i class="fa fa-star"></i>',
                emptyStar: '<i class="fa fa-star-o"></i>',
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showClose: false,
                showClear: false
            });

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
    </script>
@endsection