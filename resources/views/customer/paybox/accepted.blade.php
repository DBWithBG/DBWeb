@extends('customer.layouts.app')

@section('content')
    <section class="section sec-padding">
        <div class="section-title">
            <div class="container" style="text-align: center">
                <h1>Nous vous confirmons votre paiement, vous recevrez la facture par email dans quelques minutes.</h1>
                <a class="btn btn-primary btn-info" href="{{url("delivery/".$delivery->id."/showFacture")}}">Télécharger ma facture</a>
                <p>Nous nous occupons de vos bagages. Nous vous tiendrons au courant de l'avancée de votre commande.<br>
                 Merci de votre confiance, à bientôt.</p>
            </div>
        </div>
    </section>
@endsection