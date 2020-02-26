@extends("admin.partials.layout")

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des départements dans le système</strong> <a href="{{ route('admin.departements.new') }}" class="btn btn-info btn-xs btn-sm">Ajouter un département</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Région associée</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($departements as $dep): ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $dep->codeDep }}</td>
                                    <td>{{ $dep->nomDep }}</td>
                                    <td>{{ @$dep->region->nomReg }}</td>
                                    <td>
                                        <a href="{{ route('admin.departements.edit', ['codeDep'=>$dep->codeDep]) }}"><i class="pe-7s-cart"></i></a>
                                        <a href="{{ route('admin.departements.delete', ['codeDep'=>$dep->codeDep]) }}"><i class="pe-7s-cart"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Région associée</th>
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