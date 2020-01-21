@extends('dashboard.partials.layout')

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des inscriptions rejetées</strong>
                    </div>
                    <div class="card-body">
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date & Lieu de naissance</th>
                                    <th>Date et Heure d'inscription</th>
                                    <th>Région</th>
                                    <th>Département</th>
                                    <th>Commune</th>
                                    <th>Bureau de vote</th>
                                    <th>Détails</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inscriptions_r as $inscription)
                                <tr id="{{ $inscription->id }}">
                                    <td>{{ $inscription->nom }}</td>
                                    <td>{{ $inscription->prenom }}</td>
                                    <td>{{ $inscription->dateNaiss }} à {{ $inscription->lieuNaiss }}</td>
                                    <td>{{ date("Y-m-d H:i", $inscription->date_inscription) }}</td>
                                    <td>{{ $inscription->commune->departement->region->nomReg }}</td>
                                    <td>{{ $inscription->commune->departement->nomDep }}</td>
                                    <td>{{ $inscription->commune->nomCom }}</td>
                                    <td>{{ $inscription->bureauDeVote->nomBureau }}</td>
                                    <td class="">
                                    	<div class="action-buttons">
					                        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
					                          <i class="ace-icon fa fa-angle-double-down"></i>
					                          <span class="sr-only">Detail</span>
					                        </a>
					                    </div>
                                    <td>
                                    	<form action="{{ route('dashboard.inscription.update_statut_process') }}" method="POST" class="monForm">
                                    		<input type="hidden" name="id" value="{{ $inscription->id }}" required>
                                			<select name="statut" class="status custom-select col-md-5" required>
                                    			<option value="">Choisir l'état du dossier</option>
                                    			<option value="1">Rejeté</option>
                                    			<option value="2">Validé</option>
                                    		</select>
                                    		<input type="hidden" name="action" value="accound">
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
				                                							<input class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"name") }} name="name" value="">accept
				                                							<span class="form-check-sign">
				                                								<span class="check"></span>
				                                							</span>
				                                						</label>
				                                					</div>
				                                					<div class="form-check form-check-inline">
				                                						<label class="form-check-label">
				                                							<input class="form-check-input" type="radio" {{ is_valider($inscription->statut_elements,"name", "_refuse") }} name="name" value="mobile_refuse">refuse
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
				                                				<div class="profile-info-name">Phone</div>

				                                				<div class="profile-info-value">
				                                					<span>237 699508197</span>
				                                				</div>
				                                				<div class="checkbox-radios">
				                                					<div class="form-check form-check-inline">
				                                						<label class="form-check-label">
				                                							<input class="form-check-input" type="radio" name="mobile" value="">accept
				                                							<span class="form-check-sign">
				                                								<span class="check"></span>
				                                							</span>
				                                						</label>
				                                					</div>
				                                					<div class="form-check form-check-inline">
				                                						<label class="form-check-label">
				                                							<input class="form-check-input" type="radio" name="mobile" value="mobile_refuse">refuse
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
                                							<input type="hidden" name="id_user" value="{{ $inscription->id }}">
                                							<input type="hidden" name="action" value="valid_doc">
                                							<span id="rep2" class="col-sm-1"></span>
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
                                    <th>Date et Heure d'inscription</th>
                                    <th>Région</th>
                                    <th>Département</th>
                                    <th>Commune</th>
                                    <th>Bureau de vote</th>
                                    <th>Détails</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
@stop