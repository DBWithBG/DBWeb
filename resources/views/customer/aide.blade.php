@extends('customer.layouts.app')

@section('content')

<section class="section sec-padding">
    <div class="section-title">
        <div class="container">
            <h2 class="title">{{trans('aide.aide')}}</h2>

            <p>{{trans('aide.demande')}}&nbsp;<a href="mailto:bordeaux@deliverbag.com">bordeaux@deliverbag.com</a> {{trans('aide.phone')}} : <strong>+33 5 57 87 01 11</strong></p>

            <p>{{trans('aide.delais')}}</p>
        </div>
    </div>
</section>

@endsection