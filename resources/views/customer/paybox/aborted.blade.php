@extends('customer.layouts.app')

@section('content')
    <section class="section sec-padding">
        <div class="section-title">
            <div class="container">
                    <br><br>
                    Vous avez abandonné le paiement<br>
                    <a href="{{url("delivery/".$delivery->id."/paiement")}}">Effectuer une nouvelle tentative de paiement</a>
            </div>
        </div>
    </section>
@endsection