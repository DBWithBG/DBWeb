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
            <td style="width: 200px">SOCIETE</td>
            <td>DELIVERBAG</td>
        </tr>
        <tr>
            <td>Adresse URL de paiement</td>
            <td>{{url('/delivery/paiement')}}</td>
        </tr>
        <tr>
            <td>Identifiant du marchand</td>
            <td>1644823</td>
        </tr>
        <tr>
            <td>Préstation</td>
            <td>Prise en charge de {{sizeof($delivery->bags)}} bagages</td>
        </tr>
        <tr>
            <td>Lieu de prise en charge</td>
            <td>{{$delivery->startPosition->address}}</td>
        </tr>
        <tr>
            <td>Lieu de livraison</td>
            <td>{{$delivery->endPosition->address}}</td>
        </tr>
        <tr>
            <td>Date de prise en charge</td>
            <td>{{\Carbon\Carbon::parse($delivery->start_date)->format('d/m/Y H:i:s')}}</td>
        </tr>
        @if(!empty($delivery->date_retour))
            <tr>
                <td>Retour</td>
                <td>{{\Carbon\Carbon::parse($delivery->date_retour)->format('d/m/Y H:i:s')}}</td>
            </tr>
        @endif
        @if(!empty($delivery->time_consigne))
            <tr>
                <td>Temps de consigne des bagages : </td>
                <td>{{\Carbon\Carbon::parse($delivery->time_consigne)->format('H:i')}}</td>
            </tr>
        @else
            <tr>
                <td>Dépôt des bagages (sans consignantion) : </td>
                <td>immédiat</td>
            </tr>
        @endif
        <tr>
            <td>Référence commande</td>
            <td>{{$delivery->id}}</td>
        </tr>

    </table>

    <h3>CARTE BANCAIRE : {{$delivery->price}} EUR</h3>
    <hr>
    <table>
        <tr>
            <td style="width: 200px">Date / Heure</td>
            <td>{{\Carbon\Carbon::parse($delivery->paiement->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <td>Numéro d'autorisation</td>
            <td>{{$delivery->paiement->authorization_number}}</td>
        </tr>
        <tr>
            <td>N° transaction CB</td>
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
    Nous vous remercions de votre confiance ! A bientôt.
</footer>
</body>
</html>