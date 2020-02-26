@extends('admin.partials.layout')

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Logs du système</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>N°</th>
                                <th>Action</th>
                                <th>Effectué par</th>
                                <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            	<?php $i = 1; ?>
                                @foreach($logs as $log)
                                <tr>
                                	<td>{{ $i }}</td>
                                	<td>{!! $log->action !!}</td>
                                	<td>{{ @$log->user->name }}</td>
                                	<td>{{ date('H:i d M Y', $log->action_time) }}</td>
                                </tr>
                            	<?php $i++; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                              <tr>
                                  <th>N°</th>
                                <th>Action</th>
                                <th>Effectué par</th>
                                <th>Date</th>
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