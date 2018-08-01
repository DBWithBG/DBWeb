<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Visionnage de facture</title>

    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url({!!asset('assets/pdf/dimension.png')!!});
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
            display: inline-block;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 10px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 0.8em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>

</head>
<body>
<header class="clearfix">
    <div>
        <p style="float:left; width:90px;">
            <img style=" margin-top: 15px;" src="{!!asset('assets/pdf/logo.png')!!}"></p>
        <p>
            @if($infos->ligne_facture_1)
                <strong>{{$infos->ligne_facture_1}}</strong><br/>
            @endif

            @if($infos->ligne_facture_2)
                {{$infos->ligne_facture_2}} <br/>
            @endif
            @if($infos->ligne_facture_3)
                {{$infos->ligne_facture_3}} <br/>
            @endif

            @if($infos->ligne_facture_4)
                {{$infos->ligne_facture_4}}
            @endif
        </p>
        <p>
            @if($infos->ligne_facture_5)
                {{$infos->ligne_facture_5}}<br/>
            @endif
            @if($infos->ligne_facture_6)
                {{$infos->ligne_facture_6}}<br/>
            @endif
            @if($infos->ligne_facture_7)
                {{$infos->ligne_facture_7}}
            @endif
        </p>
    </div>
    <h1>Invoice #{{str_pad($numFact, 6,'0',0)}}</h1>
    <div id="company">
        @if($groupe_participants->societe != "")
            <div><strong>
                    @if(!empty($groupe_participants->societe))
                        {{strtoupper($groupe_participants->societe)}}
                    @else
                        {{strtoupper($groupe_participants->participants[0]->societe)}}
                    @endif
                </strong></div>
        @endif
        <div>{{strtoupper($groupe_participants->nom_responsable)}} {{ucfirst($groupe_participants->prenom)}}</div>
        <div>{{strtoupper($groupe_participants->adresse)}} </div>
        <div>{{$groupe_participants->code_postal}} - {{strtoupper($groupe_participants->ville)}} </div>
        <div>{{$groupe_participants->pays}} </div>
        <div><span>DATE : </span> {{date('y-m-d')}}</div>
    </div>
    <div class="row col-xs-12">
        <h2 style="text-align:center"> TUTTI QUANTI </h2>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">Participant</th>
            <th class="desc">Delivery</th>
            <th>Qty</th>
            <th>Price</th>
            <th>VAT</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php $a_deduire = 0; $totalMontant = 0; $totalTVA = 0; $dejaRegle = \App\Http\Controllers\FactureController::getMontantDejaRegle($groupe_participants->id);?>
        @foreach($groupe_participants->participants as $participant)

            <?php
            $totalLignes = 0;$pourcentageTVA = 0;$totalParticipant = 0;
            ?>
            <tr>
                <td class="service">{{$participant->nom.' '.$participant->prenom}}</td>
                <td class="desc">

                    @foreach($participant->prestation_choisies as $prestation)
                        <ul>
                            <li>
                                {{$prestation->prestation->en_nom}}
                                @if($prestation->prestation->affichage_adresse_facture)
                                    <br/>({{$prestation->prestation->code_postal.' - '.$prestation->prestation->ville}} {{$prestation->prestation->adresse}})
                                @endif
                            </li>
                            @foreach($prestation->gr_op_choisis as $go)
                                <ul>
                                    <li>
                                        {{$go->groupe_option->en_nom}}
                                        @foreach($go->options_choisies as $option)
                                            <ul>
                                                <li>
                                                    <?php
                                                    if (!isset($option->prix_reel)) {
                                                        $totalParticipant += $option->option->prix;
                                                    }else
                                                        $totalParticipant += $option->prix_reel;
                                                    ?>
                                                    @if(!isset($option->prix_reel))
                                                        {{$option->option->en_nom.' '}} @if($option->option->prix) {{"(".$option->option->prix." €)"}}
                                                            @if($option->option->tva > 0)
                                                                (excl. taxes)
                                                                <?php
                                                                $pourcentageTVA += ($option->option->tva/100) * $option->prix_reel
                                                                ?>
                                                            @endif
                                                            @endif
                                                    @else
                                                        {{$option->option->en_nom.' '}} @if($option->option->prix) {{"(".$option->prix_reel." €)"}}
                                                            @if($option->option->tva > 0)
                                                                (excl. taxes)
                                                                <?php
                                                                $pourcentageTVA += ($option->option->tva/100) * $option->prix_reel
                                                                ?>
                                                            @endif
                                                            @endif
                                                    @endif
                                                </li>
                                            </ul>
                                        @endforeach
                                    </li>
                                </ul>
                            @endforeach
                        </ul>
                    @endforeach
                        <?php
                        $totalMontant += $totalParticipant;
                        $totalTVA += $pourcentageTVA
                        ?>

                </td>
                <td class="unit">1</td>
                <td class="pu">{{$totalParticipant}} €</td>
                <td class="tva">{{$pourcentageTVA}} €</td>
                <td class="total">{{$totalParticipant}} €</td>
            </tr>

        @endforeach
        @foreach($groupe_participants->vads as $vad)
            <?php
            $a_deduire += $vad->prix;
            ?>
            <tr>
                <td class="service">
                </td>
                <td class="desc">
                    <ul>
                        <li>
                            {{$vad->libelle}}
                        </li>
                    </ul>
                </td>
                <?php $pp = number_format($vad->prix, 2, ',', ' '); ?>
                <td class="unit">1</td>
                <td class="pu">{{$pp}} €</td>
                <td class="tva">0</td>
                <td class="total">{{$pp}} €</td>
            </tr>
        @endforeach

        <tr>
            <td class="qty" style="background:none !important"></td>
            <td colspan="4" style="background:none !important">Subtotal</td>
            <td class="total" style="background:none !important">{{$totalMontant}} €</td>
        </tr>
        <tr>
            <td class="qty" style="background:none !important"></td>
            <td colspan="4" style="background:none !important">VAT</td>
            <td class="total" style="background:none !important">{{$totalTVA}} €</td>
        </tr>
        <tr>
            <td class="qty" style="background:none !important"></td>
            <td colspan="4" style="background:none !important">Total</td>
            <td class="total" style="background:none !important">{{$totalTTC = $totalMontant+$totalTVA+$a_deduire}} €</td>
        </tr>
        <tr>
            <td class="qty" style="background:none !important"></td>
            <td colspan="4" style="background:none !important">Already paid</td>
            <td class="total" style="background:none !important">{{$dejaRegle}} €</td>
        </tr>
        <tr>
            <td class="qty" style="background:none !important"></td>
            <td colspan="4" class="grand total" style="background:none !important; font-size:1.4em;">GRAND TOTAL</td>
            @if($totalTTC == 0)
                <td class="grand total"
                    style="background:none !important; font-size:1.4em;">{{$totalMontant+$totalTVA+$a_deduire}}
                    €
                </td>
            @else
                @if(($totalTTC-$dejaRegle) <= 0)
                    <td class="grand total" style="background:none !important; font-size:1.4em;">0
                        €
                    </td>
                @else
                    <td class="grand total" style="background:none !important; font-size:1.4em;">{{$totalTTC-$dejaRegle}}
                        €
                    </td>
                @endif
            @endif
        </tr>
        </tbody>
    </table>
    <!--<div id="notices">
      <div>NOTICE:</div>
      <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div>-->
    <div style=" height:100px;">
        <p style="font-size:2em; text-align:center; color:white;">
            <img src="{!! url('/files/bandeau/'.$groupe_participants->evenement->bandeau) !!}" width="315px"
                 height="67.77px"/>
        </p>
    </div>

    <div class="row col-xs-12">

        <p><strong>Mentions légales : </strong><br/>
            SARL TUTTI QUANTI - RCSB 435031943 - SIRET 43503194300028<br/>
            TVA intracommunautaire : FR29435031943<br/>
            RC HISCOX - 19 RUE LOUIS LEGRAND - 75002 PARIS<br/>
            Garantie financière : GROUPAMA <br/>
            5 RUE DU CENTRE | F93199 NOISY LE GRANDE CEDEX<br/>
            IBAN : FR76 1330 6000 3866 0103 9782 297 | BIC/SWIFT : AGRIFRPP833
        </p>

    </div>

</main>
<footer>
    Thanks for your trust in TUTTI QUANTI !
</footer>
</body>
</html>