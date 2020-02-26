@extends('dashboard.partials.layout')

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des régions dans le système</strong> <a href="{{ route('dashboard.gestionnaires.new') }}" class="btn btn-info btn-xs btn-sm">Ajouter un gérant</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Date de création</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1; foreach($gerants as $gerant): ?>
                                <tr>
                                	<td>{{ $i }}</td>
                                    <td>{{ $gerant->name }}</td>
                                    <td>{{ $gerant->email }}</td>
                                    <td>{{ $gerant->created_at }}</td>
                                </tr>
                                <?php $i++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Date de création</th>
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