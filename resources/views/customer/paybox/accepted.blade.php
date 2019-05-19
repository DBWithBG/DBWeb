@extends('customer.layouts.app')

@section('content')
    <section class="section sec-padding">
        <div class="section-title">
            <div class="container" style="text-align: center">
                <h1>{{trans('paybox.confirmation')}}</h1>
                <a class="btn btn-primary btn-info" href="{{url("delivery/".$delivery->id."/showFacture")}}">{{trans('paybox.dlFacture')}}</a>
                <p>{{trans('paybox.messagesuccess')}}<br>
                    {{trans('paybox.byebye')}}</p>
            </div>
        </div>
    </section>
@endsection