@extends('dashboard.partials.layout')

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des inscriptions non traitées<span class="ml-2 text-danger" style="font-size: 12px">({{ $nbr_insc_waiting }} dossiers en attente de traitement)</span></strong>
                    </div>
                    <div class="card-body">
                        <div class="card-block card-body col-sm-12 col-lg-12 col-md-12">
                            <div class="row col-12">
                                <div class="form-group col-sm-6 col-lg-6 col-md-6 col-6">
                                    <form action="{{ route('dashboard.inscriptions.waiting') }}" method="post" class="form-inline" id="orderByForm">
                                        @csrf
                                        <label for="exampleInputName2" class="pr-1  form-control-label">Trier par</label>
                                        <select name="order_by" id="order_by" required class="standardSelect">
                                            <option value="">Choisir la méthode de tri</option>
                                            <option value="nom" @if($ord_by=="nom") selected @endif>Nom</option>
                                            <option value="date_inscription" @if($ord_by=="date_inscription") selected @endif>Date d'inscription</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="form-group col-sm-6 col-lg-6 col-md-6 col-6">
                                    <form action="{{ route('dashboard.inscriptions.waiting') }}" method="post" class="form-inline" id="filterByForm">
                                        @csrf
                                        <label for="exampleInputName2" class="pr-1  form-control-label">Filtrer par</label>
                                        <select name="type_filter" id="filter_by1" required class="autreWhy standardSelect">
                                            <option value="">Choisir la méthode de filtre</option>
                                            <option value="region" @if($ord_by=="region") selected @endif>Région</option>
                                            <option value="departement" @if($ord_by=="departement") selected @endif>Département</option>
                                            <option value="commune" @if($ord_by=="commune") selected @endif>Commune</option>
                                            <option value="bureau_de_vote" @if($ord_by=="bureau_de_vote") selected @endif>Bureau de vote</option>
                                        </select>
                                        <div class="pourquoi d-none col-12">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date & Lieu de naissance</th>
                                    <th>Bureau de vote</th>
                                    <th>Région</th>
                                    <th>Détails</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inscriptions_w as $inscription)
                                <tr id="{{ $inscription->id }}">
                                    <td>{{ $inscription->nom }}</td>
                                    <td>{{ $inscription->prenom }}</td>
                                    <td>{{ $inscription->dateNaiss }} à {{ $inscription->lieuNaiss }}</td>
                                    <td>{{ $inscription->bureauDeVote->nomBureau }}</td>
                                    <td>{{ $inscription->commune->departement->region->nomReg }}</td>
                                    <td class="">
                                        <div class="action-buttons">
                                            <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                              <i class="ace-icon fa fa-angle-double-down"></i>
                                              <span class="sr-only">Detail</span>
                                            </a>
                                        </div>
                                    <td>
                                        <form action="{{ route('dashboard.inscription.update_statut_process') }}" method="POST" class="monForm">
                                            <input required type="hidden" name="id" value="{{ $inscription->id }}">
                                            <select name="statut" class="status custom-select col-md-5" required>
                                                <option value="">Choisir l'état du dossier</option>
                                                <option value="1">Rejeté</option>
                                                <option value="2">Validé</option>
                                            </select>
                                            <input required type="hidden" name="action" value="accound">
                                            <input type="submit" value="confirm" class="btn btn-danger btn-sm remo" style="display:none;">
                                            <span id="oper"></span>
                                        </form>
                                    </td>
                                </tr>
                                <tr class="detail-row {{ $inscription->id }}">
                                    <td colspan="10">
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
                                                            <button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="submit" name="send">
                                                                save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date & Lieu de naissance</th>
                                    <th>Bureau de vote</th>
                                    <th>Région</th>
                                    <th>Détails</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                         {{ @$inscriptions_w->links() }}
                    </nav>
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<style>
    .action-buttons a {
      margin: 0 3px;
      display: inline-block;
      opacity: .85;
      -webkit-transition: all .1s;
      -o-transition: all .1s;
      transition: all .1s
    }

    .action-buttons a:hover {
      text-decoration: none;
      opacity: 1;
      -moz-transform: scale(1.2);
      -webkit-transform: scale(1.2);
      -o-transform: scale(1.2);
      -ms-transform: scale(1.2);
      transform: scale(1.2)
    }

    .align-center,
    .center {
      text-align: center !important
    }

    .green {
      color: #69AA46 !important
    }

    .bigger-140 {
      font-size: 140% !important
    }

    .ace-icon {
      text-align: center
    }

    tr.detail-row {
      display: none
    }

    tr.detail-row.open {
      display: block;
      display: table-row
    }

    tr.detail-row>td {
      background-color: #f1f6f8;
      border-top: 3px solid #d1e1ea !important
    }

    .table-detail {
      background-color: #fff;
      border: 1px solid #dcebf7;
      width: 100%;
      padding: 12px
    }

    .table-detail td>.profile-user-info {
      width: 100%
    }

    .table-detail td>.profile-user-info {
      width: 100%
    }

    .profile-user-info {
      display: table;
      width: 98%;
      width: calc(100% - 24px);
      margin: 0 auto
    }

    .profile-info-row {
      display: table-row
    }

    .profile-info-name,
    .profile-info-value {
      display: table-cell;
      border-top: 1px dotted #D5E4F1
    }

    .profile-info-name {
      text-align: right;
      padding: 6px 10px 6px 4px;
      font-weight: 400;
      color: #667E99;
      background-color: transparent;
      width: 110px;
      vertical-align: middle
    }

    .profile-info-value {
      padding: 6px 4px 6px 6px
    }

    .profile-info-value>span+span:before {
      display: inline;
      content: ",";
      margin-left: 1px;
      margin-right: 3px;
      color: #666;
      border-bottom: 1px solid #FFF
    }

    .profile-info-value>span+span.editable-container:before {
      display: none
    }

    .profile-info-row:first-child .profile-info-name,
    .profile-info-row:first-child .profile-info-value {
      border-top: none
    }

    .profile-user-info-striped {
      border: 1px solid #DCEBF7
    }

    .profile-user-info-striped .profile-info-name {
      color: #336199;
      background-color: #EDF3F4;
      border-top: 1px solid #F7FBFF
    }

    .profile-user-info-striped .profile-info-value {
      border-top: 1px dotted #DCEBF7;
      padding-left: 12px
    }
    .zoom {
        -webkit-transition: all 0.35s ease-in-out;
        -moz-transition: all 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        cursor: -webkit-zoom-in;
        cursor: -moz-zoom-in;
        cursor: zoom-in;
    }

    .zoom:hover,
    .zoom:active,
    .zoom:focus {
        /**adjust scale to desired size, 
    add browser prefixes**/
        -ms-transform: scale(2.5);
        -moz-transform: scale(2.5);
        -webkit-transform: scale(2.5);
        -o-transform: scale(2.5);
        transform: scale(2.5);
        position: relative;
        z-index: 100;
    }
    </style>
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