@extends('dashboard.partials.layout')

@section('content')

<div class="content">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Cartes d'élesteurs disponibles</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nom & Prénom</th>
                  <th>Date & Lieu de naissance</th>
                  <th>Date & Heure d'inscription</th>
                  <th>Région</th>
                  <th>Département</th>
                  <th>Commune</th>
                  <th>Bureau de vote</th>
                  <th>Carte récupérée ?</th>
                  <th>Détails</th>
                </tr>
              </thead>
              <tbody>
                @foreach($electeurs as $el)
                <tr id="{{ $el->id }}">
                  <td>{{ $el->personne->nom . " ". $el->personne->prenom }}</td>
                  <td>{{ $el->personne->dateNaiss }} à {{ $el->personne->lieuNaiss }}</td>
                  <td>{{ $el->personne->created_at }}</td>
                  <td>{{ @$el->personne->commune->departement->region->nomReg }}</td>
                  <td>{{ @$el->personne->commune->departement->nomDep }}</td>
                  <td>{{ @$el->personne->commune->nomCom }}</td>
                  <td>{{ @$el->personne->bureauDeVote->nomBureau }}</td>
                  <td> @if(@$el->carteDeVote->statutCarte=='0') <span class="text-danger">Carte non disponible</span>
                       @elseif(@$el->carteDeVote->statutCarte=='2') <span class="text-warning">Carte disponible</span>
                       @elseif(@$el->carteDeVote->statutCarte=='3') <span class="text-success">Carte récupérée</span>
                       @else <span class="text-danger">Carte non existente ... aller <a href="{{ route('dashboard.inscriptions.traitement_insc', ['id'=>$el->personne->id]) }}">ici</a></span>
                       @endif
                  </td>
                  <td class="">
                    <div class="action-buttons">
                      @if(!is_null($el->carteDeVote))
                      <a href="{{ route('dashboard.inscriptions.traitement_el', ['id'=>$el->personne_id]) }}" class="green bigger-140 show-details-btn" title="Show Details">
                        <i class="ace-icon fa fa-angle-double-down"></i>
                        <span class="sr-only">Detail</span>
                      </a>
                      @else
                      <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                        <i class="ace-icon fa fa-angle-double-down"></i>
                        <span class="sr-only">Detail</span>
                      </a>
                      @endif
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Nom & Prénom</th>
                  <th>Date & Lieu de naissance</th>
                  <th>Date & Heure d'inscription</th>
                  <th>Région</th>
                  <th>Département</th>
                  <th>Commune</th>
                  <th>Bureau de vote</th>
                  <th>Carte récupérée ?</th>
                  <th>Détails</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@stop