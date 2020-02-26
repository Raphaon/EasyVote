@extends("admin.partials.layout")

@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des bureaux de vote dans le système</strong> <a href="{{ route('admin.bureau_de_vote.new') }}" class="btn btn-info btn-xs btn-sm">Ajouter une bureau de vote</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Commune</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($bureaux_de_vote as $b_d_v): ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $b_d_v->nomBureau }}</td>
                                    <td>{{ $b_d_v->commune->nomCom }}</td>
                                    <td>
                                        <a href="{{ route('admin.bureau_de_vote.edit', ['id'=>$b_d_v->id]) }}"><i class="pe-7s-cart"></i></a>
                                        <a href="{{ route('admin.bureau_de_vote.delete', ['id'=>$b_d_v->id]) }}"><i class="pe-7s-cart"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Commune</th>
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