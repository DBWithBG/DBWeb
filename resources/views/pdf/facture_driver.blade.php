<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Visionnage de facture</title>
    <style type="text/css">
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

        <table class="margin-top">

        </table>
    </div>
</body>
</html>