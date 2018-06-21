@extends('driver.layouts.app')

@section('content')

    @include('driver.layouts.sideBarre')
    <div class="main-panel">

        @include('driver.layouts.topBarre')

        <div class="content">
            <div class="container-fluid">

                @if(isset($errors))
                    @foreach ($errors->all() as $error)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger">{{$error}}</div>

                            </div>
                        </div>
                    @endforeach
                @endif

                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(!$driver->user->is_confirmed)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-text">
                                        <h4 class="card-title">Confirmation de votre adresse mail</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p>Un mail vient de vous être envoyé pour vous permettre de confirmer votre adresse. Cela est nécessaire pour la suite de votre inscription.</p>
                                            <p>Si vous n'avez pas reçu ce mail, cliquez <a href="{{url('/driver/resendConfirmationEmail')}}">ici</a>.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif

                @if(!$driver->is_op)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-text">
                                        <h4 class="card-title">Important</h4>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>Veuillez compléter votre dossier</h5>
                                            <p>Avant de commencer, nous avons besoin des pièces justificatives suivantes
                                                :</p>
                                            <ul>
                                                <li>Une photocopie de votre permis de conduire</li>
                                                <li>Une photocopie de votre carte d'identité</li>
                                                <li>Votre numéro de SIRET</li>
                                            </ul>
                                            <p>Une fois ces pièces justificatives transmises, elles seront validées par
                                                nos services et votre profil sera opérationnel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @else

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-text">
                                        <h4 class="card-title">Important</h4>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>Votre profil est validé</h5>
                                            <p>Vous pouvez dès maintenant accepter des courses depuis le menu xxx</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Informations</h4>
                                </div>

                            </div>
                            <form method="post" action="{{url('/driver/update')}}">
                                <div class="card-body">

                                    {{csrf_field()}}


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Nom</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input required type="text" name="name" class="form-control"
                                                       value="{{$driver->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Prénom</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input required type="text" name="surname" class="form-control"
                                                       value="{{$driver->surname}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Adresse mail</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input required type="email" name="email" class="form-control"
                                                       value="{{$driver->user->email}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Téléphone</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="tel" name="phone" class="form-control"
                                                       value="{{$driver->phone}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">SIRET</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" name="siret" class="form-control"
                                                       value="{{$driver->siret}}">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-fill btn-primary">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row (Informations) -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Pièces justificatives</h4>
                                </div>

                            </div>

                            <div class="card-body">

                                @if($driver->justificatifs->count() > 0)
                                    <div class="material-datatables">
                                        <table class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead class="text-center">
                                            <tr>
                                                <th class="text-left">Nom</th>
                                                <th class="text-left">Statut</th>
                                                <th class="disabled-sorting"></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($driver->justificatifs as $justificatif)
                                                <tr class="text-center">
                                                    <td class="text-left"><a
                                                                href="{{url('/driver/viewJustificatif/' . $justificatif->id)}}">{{ $justificatif->name }}</a>
                                                    </td>
                                                    <td class="text-left {{$justificatif->is_valide !== null && !$justificatif->is_valide ? 'text-danger' : ''}} {{$justificatif->is_valide !== null && $justificatif->is_valide ? 'text-success' : ''}}">{{ $justificatif->is_valide === null ? 'En attente de vérification' : ($justificatif->is_valide ? 'Vérifiée' : 'Non valide') }}</td>
                                                    <td class="text-right">
                                                        @if (!$justificatif->is_valide)
                                                            <form id="delete_justificatif_{{ $justificatif->id }}"
                                                                  method="post"
                                                                  action="{{url('/driver/deleteJustificatif/' . $justificatif->id)}}">
                                                                {{ csrf_field() }}
                                                            </form>
                                                            <button onclick="document.getElementById('delete_justificatif_{{ $justificatif->id }}').submit()"
                                                                    class="btn btn-link btn-warning btn-just-icon remove"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Supprimer"><i
                                                                        class="material-icons">close</i></button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h5>Aucune pièce justificative</h5>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row (Liste justificatifs) -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Ajouter une pièce justificative</h4>
                                </div>

                            </div>
                            <form enctype="multipart/form-data" action="{{url('/driver/addJustificatif')}}"
                                  method="post" class="form-horizontal">
                                <div class="card-body">

                                    {{ csrf_field() }}

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Nom de la pièce</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input required type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Fichier</label>

                                        <p style="padding-left: 10px" id="upload-file-info"
                                           class="text-left col-sm-5 col-form-label"></p>
                                    </div>


                                </div>
                                <div class="card-footer ">
                                    <label class="col-sm-3 btn btn-primary btn-link btn-success" for="my-file-selector">
                                        <input name="justificatif" id="my-file-selector" type="file"
                                               style="display:none"
                                               onchange="$('#upload-file-info').html(this.files[0].name)">
                                        Choisir un fichier
                                    </label>
                                    <button type="submit" class="btn btn-fill btn-primary">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row (Upload justi) -->


            </div>
        </div>
    </div>


@endsection