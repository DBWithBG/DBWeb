<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Visionnage de facture</title>
</head>
<body>
<p></p>
<img src="{{asset('/img/logo.png')}}" WIDTH="28%" height="20%" style="margin-left: 34%">

<div class="row col-xs-12" style="margin-top: 10%">
    <h3>Détails du paiement                    <span class="pull-right">{{$delivery->customer->surname}} {{$delivery->customer->name}}</span></h3>
    <hr>
    <table>
        <tr>
            <td style="width: 200px">{{trans('facture.societe')}}</td>
            <td>DELIVERBAG</td>
        </tr>
        <tr>
            <td>{{trans('facture.addr-paiement')}}</td>
            <td>{{url('/delivery/paiement')}}</td>
        </tr>
        <tr>
            <td>{{trans('facture.id-marchand')}}</td>
            <td>1644823</td>
        </tr>
        <tr>
            <td>{{trans('facture.prestation')}}</td>
            <td>Prise en charge de {{sizeof($delivery->bags)}} bagages</td>
        </tr>
        <tr>
            <td>{{trans('facture.lp')}}</td>
            <td>{{$delivery->startPosition->address}}</td>
        </tr>
        <tr>
            <td>{{trans('facture.ll')}}</td>
            <td>{{$delivery->endPosition->address}}</td>
        </tr>
        <tr>
            <td>{{trans('facture.dp')}}</td>
            <td>{{\Carbon\Carbon::parse($delivery->start_date)->format('d/m/Y H:i:s')}}</td>
        </tr>
        @if(!empty($delivery->date_retour))
            <tr>
                <td>{{trans('facture.retour')}}</td>
                <td>{{\Carbon\Carbon::parse($delivery->date_retour)->format('d/m/Y H:i:s')}}</td>
            </tr>
        @endif

        <tr>
            <td>{{trans('facture.ref-commande')}}</td>
            <td>{{$delivery->id}}</td>
        </tr>

    </table>

    <h3>{{trans('facture.cb')}}: {{$delivery->price}} EUR</h3>
    <hr>
    <table>
        <tr>
            <td style="width: 200px">{{trans('facture.dh')}}</td>
            <td>{{\Carbon\Carbon::parse($delivery->paiement->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <td>{{trans('facture.no-auth')}}</td>
            <td>{{$delivery->paiement->authorization_number}}</td>
        </tr>
        <tr>
            <td>{{trans('facture.no-tr')}}</td>
            <td>{{$delivery->paiement->transaction_number}}</td>
        </tr>

    </table>


</div>

<footer style="margin-top: 20%">
    <p><strong>Informations : </strong><br/>
        SARL DELIVERBAG
        SIRET  	82770547600014
        45 AV DE LA LIBERATION C DE GAULLE 33110 LE BOUSCAT, FRANCE<br/>
        IBAN : FR76 1330 6000 3866 0103 9782 297 | BIC/SWIFT : AGRIFRPP833
    </p>
    <hr>
    {{trans('facture.thx')}}
</footer>
</body>
</html>