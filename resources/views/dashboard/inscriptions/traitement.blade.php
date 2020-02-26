@extends('dashboard.partials.layout')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-block card-body col-sm-12 col-lg-12 col-md-12">
                <div class="row col-12">
                    <div class="form-group col-sm-5 col-lg-5 col-md-5 col-5 h4">
                        <strong>Dossier d'inscription de {{ ucwords($inscription->nom . " " . $inscription->prenom) }} </strong>
                        <span id="oper"></span>
                    </div>
                    <div class="form-group col-sm-7 col-lg-7 col-md-7 col-7">
                        <form action="{{ route('dashboard.inscription.update_statut_process') }}" method="POST" class="monForm">
                            <input required type="hidden" name="id" value="{{ $inscription->id }}">
                            <select name="statut" class="status custom-select col-md-5" required>
                                <option value="">Choisir l'état du dossier</option>
                                <option value="1" @if($inscription->statut_process=='1') selected @endif >Rejeté</option>
                                <option value="2" @if($inscription->statut_process=='2') selected @endif>Validé</option>
                            </select>
                            <input required type="hidden" name="action" value="accound">
                            <input type="submit" value="confirm" class="btn btn-danger btn-sm remo">
                        </form>
                    </div>
                </div>
            </div>
            @if($inscription->statut_process=='2')
            <div class="card-body card-block" style="border: 2px solid #dee2e6!important">
                <form action="{{ route('dashboard.inscription.add_matricule_electeur') }}" method="POST" class="monForm" class="form-horizontal">
                    <div class="row form-group">
                        <strong>Informations supplémentaires ..</strong>
                        <input required type="hidden" name="personne_id" value="{{ $inscription->id }}">
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            Matricule de l'électeur <input type="text" name="matricule" class="form-control" required value="{{ @$inscription->electeur->matricule }}" >
                        </div>
                        <div class="col-6">
                            Date de Délivrance de la carte d'électeur <input type="date" name="date_deliv" class="form-control"
                            value="<?php if(!is_null(@$inscription->electeur->carteDeVote->dateDeliv)){ echo(date('Y-m-d', @$inscription->electeur->carteDeVote->dateDeliv)); } ?>" required min="<? date('Y-m-d', time()) ?>">
                        </div>
                    </div>
                    <input type="submit" value="confirm" class="btn btn-danger btn-sm remo pull-right">
                </form>
            </div>
            @endif
        </div>
        <div class="card-body">
            <div class="row col m-2 h4">
                Informations de l'inscrit
            </div>
            <form action="{{ route('dashboard.inscription.update_statut_elements') }}" method="post" accept-charset="utf-8" class="reseau">
                <div class="table-detail">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Nom</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->nom }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"name") }} name="name" value="name">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"name", "_refuse") }} name="name" value="name_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Prenom</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->prenom }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"prenom") }} name="prenom" value="prenom">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"prenom", "_refuse") }} name="prenom" value="prenom_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Date de Naissance</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->dateNaiss }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"dateNaiss") }} name="dateNaiss" value="dateNaiss">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"dateNaiss", "_refuse") }} name="dateNaiss" value="dateNaiss_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Lieu de Naissance</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->lieuNaiss }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"lieuNaiss") }} name="lieuNaiss" value="lieuNaiss">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"lieuNaiss", "_refuse") }} name="lieuNaiss" value="lieuNaiss_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Occupation</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->profession_occupation }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"profession_occupation") }} name="profession_occupation" value="profession_occupation">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"profession_occupation", "_refuse") }} name="profession_occupation" value="profession_occupation_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Nom du pére</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->nomPere }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"nomPere") }} name="nomPere" value="nomPere">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"nomPere", "_refuse") }} name="nomPere" value="nomPere_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Nom de la mère</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->nomMere }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"nomMere") }} name="nomMere" value="nomMere">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"nomMere", "_refuse") }} name="nomMere" value="nomMere_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Numéro CNI</div>

                                    <div class="profile-info-value">
                                        <span>{{ $inscription->numCNI }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"numCNI") }} name="numCNI" value="numCNI">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"numCNI", "_refuse") }} name="numCNI" value="numCNI_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Résidence</div>
                                    <div class="profile-info-value">
                                        <span>{{ $inscription->domicile_residence }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"domicile_residence") }} name="domicile_residence" value="domicile_residence">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"domicile_residence", "_refuse") }} name="domicile_residence" value="domicile_residence_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Telephone</div>

                                    <div class="profile-info-value">
                                        <span>{{ $inscription->telephone }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"telephone") }} name="telephone" value="telephone">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"telephone", "_refuse") }} name="telephone" value="telephone_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Photo CNI Recto</div>
                                    <div class="profile-info-value text-center" style="vertical-align: middle;">
                                        <button type="button" data-toggle="modal" data-target="#staticModal" data-image="{{ asset($inscription->cniPhoto) }}" class="btn btn-link showImgModal">Voir l'image</button>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"photocniRecto") }} name="photocniRecto" value="cniPhoto">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"photocniRecto", "_refuse") }} name="photocniRecto" value="cniPhoto_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Photo CNI Verso</div>
                                    <div class="profile-info-value text-center" style="vertical-align: middle;">
                                        <button type="button" data-toggle="modal" data-target="#staticModal" data-image="{{ asset($inscription->cniPhotoVerso) }}" class="btn btn-link showImgModal">Voir l'image</button>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"photocniVerso") }} name="photocniVerso" value="cniPhoto">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"photocniVerso", "_refuse") }} name="photocniVerso" value="cniPhoto_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Photo Personne</div>
                                    <div class="profile-info-value text-center" style="vertical-align: middle;">
                                        <button type="button" data-toggle="modal" data-target="#staticModal" data-image="{{ asset($inscription->imgPersonne) }}" class="btn btn-link showImgModal">Voir l'image</button>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"photoP") }} name="photoP" value="imgPersonne">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"photoP", "_refuse") }} name="photoP" value="imgPersonne_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Commune</div>

                                    <div class="profile-info-value">
                                        <span>{{ $inscription->commune->nomCom }}</span>
                                    </div>
                                    <div class="checkbox-radios">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"commune_id") }} name="commune_id" value="{{ $inscription->commune->id }}">accept
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input required class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"commune_id", "_refuse") }} name="commune_id" value="mobile_refuse">refuse
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-1">
                            <div class="row">
                                <input required type="hidden" name="id_user" value="{{ $inscription->id }}">
                                <div id="rep2" class="col-sm-12"></div>
                                <button class="pull-right btn btn-sm btn-primary btn-round" type="submit" name="send">Sauvegarder</button>
                                <a href="{{ $route_back }}" class="pull-right btn btn-sm btn-danger btn-round mt-4">Annuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" id="showImg">
           </div>
        </div>
    </div>
</div>
@stop