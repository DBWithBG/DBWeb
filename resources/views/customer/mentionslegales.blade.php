@extends('customer.layouts.app')

@section('content')

    <section class="section sec-padding">
        <div class="section-title">
            <div class="container">
                <h2 class="title">{{trans('mentions.mentions')}}</h2>


                <p>{{trans('mentions.editeur')}} deliverbag.fr : DELIVERBAG, 45 AV DE LA LIBERATION C DE GAULLE 33110 LE BOUSCAT</p>
                <p>{{trans('mentions.capital')}} 4000 €</p>
                <p>SIRET 82770547600014</p>
                <p>{{trans('mentions.directeur')}}: Pierre LE MOIGNIC</p>
                <p>Webmaster : Pierre LE MOIGNIC bordeaux@deliverbag.com (bordeaux@deliverbag.com) - 05 57 84 01 11</p>
                <p>{{trans('mentions.hebergeur')}} : OVH 2 rue Kellermann 59100 ROUBAIX www.ovh.com (www.ovh.com)</p>
            </div>
        </div>
    </section>

@endsection