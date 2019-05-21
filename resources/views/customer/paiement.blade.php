@extends('customer.layouts.app')

@section('content')
    {{dd($delivery)}}
    <section class="section sec-padding">
        <div class="containter">
        <div class="col-md-12">
            <form method="post" action="{{"/delivery/paiement"}}" id="paiement">
                <div class="form-body">
                    <input type="hidden" value="{{$delivery->id}}" name="delivery_id">

                    <h1 style="margin-left: 32%">{{trans('paiement.recap')}}</h1><br>
                    <h4 style="margin-left: 30%">
                        {{trans('paiement.lp')}}: <strong>{{$delivery->startPosition->address}}</strong><br>
                        {{trans('paiement.datepc')}}: <strong>{{\Carbon\Carbon::parse($delivery->start_date)->format('d/m/Y H:i')}}</strong><br>
                        {{trans('paiement.ll')}}: <strong>{{$delivery->endPosition->address}}</strong><br>
                        {{trans('paiement.dl')}}: <strong>{{\Carbon\Carbon::parse($delivery->end_date)->format('d/m/Y H:i')}}</strong><br>
                        {{trans('paiement.nbBags')}}: <strong>{{$delivery->nb_bags}}</strong>
                    <!--@if(!empty($delivery->time_consigne))
                            Temps de consigne : <strong>{{\Carbon\Carbon::parse($delivery->time_consigne)->format('H:i')}}</strong>
                        @else
                            <strong>livraison dès que possible</strong>
                        @endif-->
                        @if(!empty($delivery->date_retour))
                            <br>{{trans('paiement.retour')}}: {{\Carbon\Carbon::parse($delivery->date_retour)->format('d/m/Y H:i')}}
                        @endif

                    </h4>
                    <h3 style="margin-left: 30%">{{trans('paiement.total')}}: {{$delivery->price}} €</h3>
                    <button type="submit" class="btn btn-primary btn-success" style="margin-left: 43%; margin-top: 50px">{{trans('paiement.paiement')}}</button><br><br>
                    <hr>
                </div>
                {{csrf_field()}}
            </form>
        </div>
        </div>

    </section>
@endsection