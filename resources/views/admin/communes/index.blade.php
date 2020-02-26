@extends("admin.partials.layout")

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des communes dans le système</strong> <a href="{{ route('admin.communes.new') }}" class="btn btn-info btn-xs btn-sm">Ajouter une commune</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Département associé</th>
                                    <th>Région associée</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($communes as $com): ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $com->codeCom }}</td>
                                    <td>{{ $com->nomCom }}</td>
                                    <td>{{ @$com->departement->nomDep }}</td>
                                    <td>{{ @$com->departement->region->nomReg }}</td>
                                    <td>
                                        <a href="{{ route('admin.communes.edit', ['codeCom'=>$com->codeCom]) }}"><i class="pe-7s-cart"></i></a>
                                        <a href="{{ route('admin.communes.delete', ['codeCom'=>$com->codeCom]) }}"><i class="pe-7s-cart"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Département associé</th>
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