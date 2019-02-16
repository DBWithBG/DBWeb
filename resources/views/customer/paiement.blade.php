@extends('customer.layouts.app')

@section('content')
    <div class="clearfix"></div>
    <section class="text-center">
        <div class="col-md-12 text-center">
            <form method="post" action="{{"/delivery/paiement"}}" id="paiement">
                <div class="form-body">
                    <input type="hidden" value="{{$delivery->id}}" name="delivery_id">

                    Le montant total de votre commande est de {{$delivery->price}} €<br>
                    <button type="submit" class="btn btn-primary btn-success">Aller au paiement</button>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </section>
@endsection