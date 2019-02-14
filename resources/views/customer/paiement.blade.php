@extends('customer.layouts.app')

@section('content')
    <form method="post" action="{{"delivery/paiement"}}" id="paiement">
        <div class="form-body">
            <input type="hidden" value="{{$delivery->id}}" name="delivery_id">
            Le montant total de votre commande est de {{$delivery->price}}
            <button type="submit">Aller au paiement</button>
        </div>
    </form>
@endsection