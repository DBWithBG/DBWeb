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
                <div class="domain-pricing-table">
                    <table class="table-style-2">
                        <thead>
                        <tr>
                            <th>Date de création</th>
                            <th>Statut</th>
                            <th>Distance</th>
                            <th>Durée estimée</th>
                            <th>Prix</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries as $delivery)
                            <tr>
                                <td>{{date('d / m / y', strtotime($delivery->created_at))}}</td>
                                <td>{{$delivery->status}}</td>
                                <td>{{$delivery->distance}}</td>
                                <td>{{$delivery->estimated_time}}</td>
                                <td>{{$delivery->price}}</td>
                                <td><a data-toggle="modal" data-target="#modal_comment_{{$delivery->id}}"
                                       class="text-warning" href="#">Commenter</a></td>
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



@endsection

@section('custom-scripts')

@endsection