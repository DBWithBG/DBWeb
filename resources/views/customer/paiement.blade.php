@extends('customer.layouts.app')

@section('content')
    <div class="clearfix"></div>
    <section class="text-center">
        <div class="col-md-12 text-center">
            <form method="post" action="{{"/delivery/paiement"}}" id="paiement">
                <div class="form-body">
                    <input type="hidden" value="{{$delivery->id}}" name="delivery_id">

                    <h1>Le montant total de votre commande est de {{$delivery->price}} €</h1><br>
                    <blockquote>
                        Lieu de prise en charge : {{$delivery->startPosition->address}}
                        Date de prise en charge : {{\Carbon\Carbon::parse($delivery->start_date)->format('d/m/Y H:m')}}
                        Lieu de livraison : {{$delivery->endPosition->address}}
                        @if(!empty($delivery->end_date))
                            Date de livraison après consignage : {{\Carbon\Carbon::parse($delivery->end_date)->format('d/m/Y H:m')}}
                        @else
                            livraison dès que possible
                        @endif

                    </blockquote>
                    <button type="submit" class="btn btn-primary btn-success">Aller au paiement</button>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </section>
@endsection