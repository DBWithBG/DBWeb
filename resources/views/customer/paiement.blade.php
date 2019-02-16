@extends('customer.layouts.app')

@section('content')
    <div class="clearfix"></div>
    <section class="text-center">
        <div class="col-md-12 text-center">
            <form method="post" action="{{"/delivery/paiement"}}" id="paiement">
                <div class="form-body">
                    <input type="hidden" value="{{$delivery->id}}" name="delivery_id">

                    <h1>Le montant total de votre commande est de {{$delivery->price}} €</h1><br>
                    <table class="text-center" style="text-align: center">
                        <tr>
                            <td>Lieu de prise en charge</td>
                            <td>{{$delivery->startPosition->address}}</td>
                        </tr>
                        <tr>
                            <td>Lieu de livraison</td>
                            <td>{{$delivery->endPosition->address}}</td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-success">Aller au paiement</button>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </section>
@endsection