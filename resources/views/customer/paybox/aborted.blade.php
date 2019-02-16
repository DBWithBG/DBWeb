@extends('customer.layouts.app')

@section('content')
    <section class="section sec-padding">
        <div class="section-title">
            <div class="container" style="text-align: center">
                    <br><br>
                    <h1>Vous avez abandonné le paiement</h1><br>
                    <form action="{{url("/delivery/paiement")}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$delivery->id}}" name="delivery_id">
                        <button type="submit" class="btn btn-primary btn-success">Réessayer et accéder au paiement de {{$delivery->price}} €</button>
                    </form>
            </div>
        </div>
    </section>
@endsection