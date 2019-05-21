@extends('customer.layouts.app')

@section('content')

<section class="section sec-padding">
    <div class="section-title">
        <div class="container">
            <h2 class="title">{{trans('regles.regles')}}</h2>

            <p>{!!trans('regles.resa')!!}</p>

            <p>{!!trans('regles.resaMinuit')!!}</p>

            <p>{!!trans('regles.demande')!!}</p>

            <p>{!!trans('regles.acceptons')!!}</p>

            <p>{!!trans('regles.definition')!!}</p>

            <p style="margin-left:40px"><strong>{{trans('regles.tarifs')}}</strong></p>

            <!--<p style="margin-left:40px">. Bordeaux M&eacute;tropole : 20&euro; le premier bagage puis 10&euro; par bagage suppl&eacute;mentaire.</p>

            <p style="margin-left:40px">. Gironde : Forfait 75&euro; de 1 &agrave;&nbsp;3&nbsp;bagages&nbsp;puis 18&euro; par bagage suppl&eacute;mentaire.</p>

            <p style="margin-left:40px">. Hors Gironde : Livraison possible sur devis uniquement.</p>

            <p><strong>Si vous r&eacute;servez simultan&eacute;ment&nbsp;l&#39;aller-retour, b&eacute;n&eacute;ficiez d&#39;une r&eacute;duction de&nbsp;25% sur le trajet retour !</strong></p>
-->
            <p style="margin-left:40px">{{trans('regles.voirtarifs')}}</p>
            <p>{{trans('regles.groupe')}}</p>
        </div>
    </div>
</section>

@endsection