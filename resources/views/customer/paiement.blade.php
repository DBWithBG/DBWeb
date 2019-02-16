@extends('customer.layouts.app')

@section('content')
    <div class="clearfix"></div>
    <section class="text-center">
        <div class="col-md-12 text-center">
            <form method="post" action="{{"/delivery/paiement"}}" id="paiement">
                <div class="form-body">
                    <input type="hidden" value="{{$delivery->id}}" name="delivery_id">

                    <h1>Le montant total de votre commande est de {{$delivery->price}} €</h1><br>
                    <h4>
                        Lieu de prise en charge : <strong>{{$delivery->startPosition->address}}</strong><br>
                        Lieu de livraison : <strong>{{$delivery->endPosition->address}}</strong><br>
                        Date de prise en charge : <strong>{{\Carbon\Carbon::parse($delivery->start_date)->format('d/m/Y H:i')}}</strong><br>
                        @if(!empty($delivery->time_consigne))
                            Temps de consignage : <strong>{{\Carbon\Carbon::parse($delivery->time_consigne)->format('h:i')}}</strong>
                        @else
                            <strong>livraison dès que possible</strong>
                        @endif

                    </h4>
                    <button type="submit" class="btn btn-primary btn-success">Aller au paiement ({{$delivery->price}} €)</button><br><br>
                    <hr>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </section>
@endsection