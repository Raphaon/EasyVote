@extends("admin.partials.layout")

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-block card-body col-sm-12 col-lg-12 col-md-12">
                <div class="row col-12">
                    <div class="form-group col-sm-5 col-lg-5 col-md-5 col-5 h4">
                        <strong>Editer un bureau de vote </strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.bureau_de_vote.save') }}" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-6">
                        Nom du bureau de vote <input type="text" name="nomBureau" class="form-control" required value="" >
                    </div>
                    <div class="col-6">
                        Commune
                        <select name="commune_id" class="form-control" required>
                            <option value="">Sélectionner la commune</option>
                            @foreach($communes as $com)
                            <option value="{{ $com->id }}" @if($com->id == @$b_d_v->commune->id) selected @endif>{{ $com->nomCom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-1">
                    <div class="row">
                        <input type="submit" name="update" class="pull-right btn btn-sm btn-primary btn-round" value="Sauvegarder">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop