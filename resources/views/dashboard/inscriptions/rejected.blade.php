@extends('dashboard.partials.layout')

@section('content')

<div class="content">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Liste des inscriptions rejetées<span class="ml-2 text-danger" style="font-size: 12px">({{ $nbr_insc_rejected }} dossiers en attente de correction)</span></strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Date & Lieu de naissance</th>
                  <th>Bureau de vote</th>
                  <th>Région</th>
                  <th>Détails</th>
                </tr>
              </thead>
              <tbody>
                @foreach($inscriptions_r as $inscription)
                <tr id="{{ $inscription->id }}">
                  <td>{{ $inscription->nom }}</td>
                  <td>{{ $inscription->prenom }}</td>
                  <td>{{ $inscription->dateNaiss }} à {{ $inscription->lieuNaiss }}</td>
                  <td>{{ @$inscription->bureauDeVote->nomBureau }}</td>
                  <td>{{ @$inscription->commune->departement->region->nomReg }}</td>
                  <td class="">
                    <div class="action-buttons">
                      <a href="{{ route('dashboard.inscriptions.traitement_insc', ['id'=>$inscription->id]) }}" class="green bigger-140 show-details-btn" title="Show Details">
                        <i class="ace-icon fa fa-angle-double-down"></i>
                        <span class="sr-only">Detail</span>
                      </a>
                    </div>
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