@extends('customer.layouts.app')

@section('content')
    <section class="section sec-padding">
        <div class="section-title">
            <div class="container">
                    <br><br>
                    Vous avez abandonné le paiement<br>
                    <form action="{{url("/delivery/paiement")}}" method="POST">
                        <input type="hidden" value="{{$delivery->id}}" name="delivery_id">
                        <button type="submit" class="btn btn-primary btn-success">Accéder au paiement de {{$delivery->price}} €</button>
                    </form>
            </div>
        </div>
    </section>
@endsection