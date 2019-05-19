@extends('customer.layouts.app')

@section('content')

    <section class="section sec-padding">
    <div class="section-title">
        <div class="container">
            <h2 class="title">{{trans('apropos.apropos')}}</h2>

            <p>{{trans('apropos.graced')}}</p>

            <p>{{trans('apropos.abordeaux')}} <strong>{{trans('apropos.assurer')}}</strong> {{trans('apropos.luxe')}}</p>

            <p>{{trans('apropos.service')}}</p>

            <p>{{trans('apropos.liberons')}}</p>

            <p>{{trans('apropos.partez')}}</p>

            <p>{{trans('apropos.prise')}}</p>

            <p>&nbsp;</p>

            <p><strong>Deliverbag</strong></p>

            <p>45 avenue de la Liberation</p>

            <p>33110 Le Bouscat&nbsp;</p>

            <p>{{trans('apropos.tel')}} : + 33 (0)5.57.87.01.11</p>

            <p>827 705 476 R.C.S Bordeaux &nbsp;</p>
        </div>
    </div>
</section>

@endsection