<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Visionnage de facture</title>
</head>
<body>
    <p></p>
    <img src="{{asset('/img/logo.png')}}" WIDTH="30%" height="20%" style="margin-left: 34%">

    <div class="row col-xs-12" style="margin-top: 10%">
        <h3>Détails du paiement</h3>
        <hr>
        <table>
            <tr>
                <td style="width: 200px">SOCIETE</td>
                <td>DELIVERBAG</td>
            </tr>
            <tr>
                <td>Adresse URL de paiement</td>
                <td>xx</td>
            </tr>
            <tr>
                <td>Identifiant du marchand</td>
                <td>xx</td>
            </tr>
            <tr>
                <td>Préstation</td>
                <td>Prise en charge de bagages</td>
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
                <td>Référence commande</td>
                <td>{{$delivery->id}}</td>
            </tr>
        </table>

        <h3>CARTE BANCAIRE : {{$delivery->price}} EUR</h3>
        <hr>
        <table>
            <tr>
                <td style="width: 200px">Date / Heure</td>
                <td>{{\Carbon\Carbon::now()->format('d/m/Y H:m:s')}}</td>
            </tr>
            <tr>
                <td>Numéro d'autorisation</td>
                <td>xx</td>
            </tr>
            <tr>
                <td>N° transaction CB</td>
                <td>xx</td>
            </tr>
        </table>


    </div>

<footer style="margin-top: 30%">
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