@extends('customer.layouts.app')

@section('content')
    <section class="section sec-padding">
        <div class="containter">
        <div class="col-md-12">
            @if(!$delivery->customer->is_pro)
            <form method="post" action="{{"/delivery/paiement"}}" id="paiement">
                @endif
                <div class="form-body">
                    <input type="hidden" value="{{$delivery->id}}" name="delivery_id">

                    <h1>{{trans('paiement.recap')}}</h1><br>
                    <h4>
                        {{trans('paiement.lp')}}: <strong>{{$delivery->startPosition->address}}</strong><br>
                        {{trans('paiement.datepc')}}: <strong>{{\Carbon\Carbon::parse($delivery->start_date)->format(App::isLocale('en') ?'m/d/Y H:i A' : 'd/m/Y H:i')}}</strong><br>
                        {{trans('paiement.ll')}}: <strong>{{$delivery->endPosition->address}}</strong><br>
                        {{trans('paiement.dl')}}: <strong>{{\Carbon\Carbon::parse($delivery->end_date)->format(App::isLocale('en') ?'m/d/Y H:i A' : 'd/m/Y H:i')}}</strong><br>
                        {{trans('paiement.nbBags')}}: <strong>{{$delivery->nb_bags}}</strong>
                    <!--@if(!empty($delivery->time_consigne))
                            Temps de consigne : <strong>{{\Carbon\Carbon::parse($delivery->time_consigne)->format('H:i')}}</strong>
                        @else
                            <strong>livraison dès que possible</strong>
                        @endif-->
                        @if(!empty($delivery->date_retour))
                            <br>{{trans('paiement.retour')}}: {{\Carbon\Carbon::parse($delivery->date_retour)->format(App::isLocale('en') ?'m/d/Y H:i A' : 'd/m/Y H:i')}}
                        @endif

                    </h4>
                    @if(!$delivery->customer->is_pro)
                    <h3 style="margin-left: 30%">{{trans('paiement.total')}}: {{$delivery->price}} €</h3>
                    <button type="submit" class="btn btn-primary btn-success" style="margin-top: 50px">{{trans('paiement.paiement')}}</button><br><br>
                    @else
                        <div class="col-md-12">
                            <div class="text-box white padding-4">
                                <div class="smartforms-modal-body">
                                    <div class="smart-wrap">
                                        <div class="smart-forms smart-container transparent wrap-full">
                                            <div class="form-body no-padd">
                        <h3>Saisie des informations client</h3>
                            <form method="post" action="{{url("savebags/delivery")}}" id="account">
                                <input type="hidden" value="{{$delivery->id}}" name="delivery_id">
                                <div class="row row-margin">
                                    <div class="col-md-12">
                                        <label for="email" class="field-label" ><strong>Nom du client</strong></label>
                                        <label class="field prepend-icon">
                                            <input required type="text"  class="gui-input" id="input_nb_bags" name="customer_name" placeholder="Nom"/>
                                            <span class="field-icon"><i class="fa fa-user" style="color : black"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row row-margin">
                                    <div class="col-md-12">
                                        <label for="email" class="field-label" ><strong>Prénom du client</strong></label>
                                        <label class="field prepend-icon">
                                            <input required type="text"  class="gui-input"  name="customer_surname" placeholder="Prénom"/>
                                            <span class="field-icon"><i class="fa fa-user" style="color : black"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row row-margin">
                                    <div class="col-md-12">
                                        <label for="email" class="field-label" ><strong>Email du client</strong></label>
                                        <label class="field prepend-icon">
                                            <input required type="text"  class="gui-input"  name="customer_email" placeholder="Email"/>
                                            <span class="field-icon"><i class="fa fa-envelope" style="color : black"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row row-margin">
                                    <div class="col-md-12">
                                        <label for="email" class="field-label" ><strong>Téléphone du client</strong></label>
                                        <label class="field prepend-icon">
                                            <input required type="text"  class="gui-input"  name="customer_phone" placeholder="Téléphone"/>
                                            <span class="field-icon"><i class="fa fa-phone" style="color : black"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row row-margin">
                                    <div class="col-md-12">
                                        <label for="email" class="field-label" ><strong>Commentaire</strong></label>
                                        <label class="field prepend-icon">
                                            <textarea type="text"  class="gui-input"  name="customer_commentaire" placeholder="Commentaire relatif à la course"></textarea>
                                            <span class="field-icon"><i class="fa fa-comment" style="color : black"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-success">Validation la course</button><br><br>
                                {{csrf_field()}}
                            </form>
                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    <hr>
                </div>
                @if(!$delivery->customer->is_pro)

                {{csrf_field()}}
            </form>
                @endif

        </div>
        </div>

    </section>
@endsection