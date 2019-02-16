@extends('customer.layouts.app')

@section('content')
    <section class="section sec-padding">
        <div class="section-title">
            <div class="container">
                <h1>Nous vous confirmons votre paiement, vous recevrez la facture par email dans quelques minutes.</h1>
                <a class="btn btn-primary btn-info" href="{{url("delivery/".$delivery->id."/showFacture")}}">Télécharger ma facture</a>
            </div>
        </div>
    </section>
@endsection