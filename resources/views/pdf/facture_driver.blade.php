<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Visionnage de facture</title>
    <style type="text/css">

        table {
            border-spacing: 0px;
        }
    
        body {
            font-family: Sans-Serif;
        }

        .logo {
            height: 10%;
            margin-left: 1%;
        }

        .content {
            margin-top: 10%;
        }

        .big-spacer {
            width: 36%;
        }

        .little-spacer {
            width: 15%;
        }

        .margin-top {
            margin-top: 10%;
        }

        .deliveries {
            width: 100%;
        }

        .tdpad {
            padding: 20px;
        }

        th {
            border-bottom: 2px solid black;
        }

        .line-before {
            border-top: 2px solid black;
        }

        td {
            padding-top: 6px;
            padding-bottom: 6px;
        }

    </style>
</head>
<body>
    <img class="logo" src="{{public_path() . '/img/logo_plat_milieu.png'}}">
    <div class="content">
        <table>
            <tr>
                <td>
                    <div class="infodeliverbag">
                        <span><b>45 Avenue de la libération</b></span><br/>
                        <span>33110 Le bouscat - France</span><br/>
                        <span>+33 (0) 5 57 87 01 11</span><br/>
                        <span>bordeaux@deliverbag.com</span><br/>
                        <span>www.deliverbag.com</span><br/>
                    </div>
                </td>
                <td class="big-spacer"></td>
                <td>
                    <div class="infodriver">
                        <span><b>{{$driver->surname . ' ' . $driver->name}}</b></span><br/>
                        <span><b>{{$driver->user->email}}</b></span><br/>
                        <span><b>{{$driver->phone}}</b></span><br/>
                        <span><b>{{$driver->siret}}</b></span><br/>
                    </div>
                </td>
            </tr>
        </table>

        <table class="margin-top">
            <tr>
                <td><b>DATE</b></td>
                <td class="little-spacer"></td>
                <td><b>{{\Carbon\Carbon::now()->format('d/m/Y H:m:s')}}</b></td>
            </tr>
            <tr>
                <td><b>FACTURE</b></td>
                <td class="little-spacer"></td>
                <td><b>XXXXXXX</b></td>
            </tr>
        </table>

        <table class="margin-top deliveries">
            <thead>
                <tr>
                    <th style="text-align: left;">Désignation</th>
                    <th style="text-align: right">Quantité</th>
                    <th style="text-align: right">Unité</th>
                    <th style="text-align: right">Prix unitaire HT</th>
                    <th style="text-align: right">Prix total HT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveries as $takeOverDelivery)
                <tr>
                    <td>Course du {{$takeOverDelivery->delivery->start_date}}</td>
                    <td style="text-align: right; width: 80px;">1</td>
                    <td style="text-align: right; width: 120px;">Forfait</td>
                    <td style="text-align: right; width: 130px;">{{$takeOverDelivery->delivery->remuneration_driver}}€</td>
                    <td style="text-align: right; width: 120px;">{{$takeOverDelivery->delivery->remuneration_driver}}€</td>
                </tr>    
                @endforeach
                <tr>
                        <td ></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="line-before" style="text-align: right;"><b>TOTAL HT</b></td>
                    <td class="line-before"></td>
                    <td class="line-before" style="text-align: right;">{{$totalHT}} €</td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;"><b>TVA</b></td>
                    <td style="text-align: right;">{{$TVA}}%</td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;"><b>TOTAL TTC</b></td>
                    <td></td>
                    <td style="text-align: right;">{{$totalTTC}} €</td>
                </tr>

                
            </tbody>
        </table>

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
    </div>
</body>
</html>