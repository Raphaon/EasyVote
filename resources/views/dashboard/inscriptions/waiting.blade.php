@extends('dashboard.partials.layout')

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des inscriptions non traitées<span class="ml-2 text-danger" style="font-size: 12px">({{ $nbr_insc_waiting }} dossiers en attente de traitement)</span></strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date & Lieu de naissance</th>
                                    <th>Bureau de vote</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inscriptions_w as $inscription)
                                <tr>
                                    <td>{{ $inscription->nom }}</td>
                                    <td>{{ $inscription->prenom }}</td>
                                    <td>{{ $inscription->dateNaiss }} à {{ $inscription->lieuNaiss }}</td>
                                    <td>{{ $inscription->bureauDeVote->nomBureau }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date & Lieu de naissance</th>
                                    <th>Bureau de vote</th>
                                    <th>Actions</th>
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