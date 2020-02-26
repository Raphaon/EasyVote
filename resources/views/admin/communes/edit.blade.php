@extends("admin.partials.layout")

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-block card-body col-sm-12 col-lg-12 col-md-12">
                <div class="row col-12">
                    <div class="form-group col-sm-5 col-lg-5 col-md-5 col-5 h4">
                        <strong>Editer une commune </strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.communes.update') }}" method="post">
                @csrf
                <input type="hidden" name="idCom" required value="{{ $commune->id }}">
                <div class="row form-group">
                    <div class="col-6">
                        Code Commune <input type="text" name="code_com" class="form-control" required value="{{ @$commune->codeCom }}" >
                    </div>
                    <div class="col-6">
                        Nom Commune <input type="text" name="nom_com" class="form-control" required value="{{ @$commune->nomCom }}" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                       Département de la commune
                        <select name="departement_id" class="form-control" required>
                            <option value="">Sélectionner le département</option>
                            @foreach($departements as $dep)
                            <option value="{{ $dep->id }}" @if($dep->id == @$commune->departement->id) selected @endif>{{ $dep->nomDep }}</option>
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