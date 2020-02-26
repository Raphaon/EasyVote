@extends("admin.partials.layout")

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-block card-body col-sm-12 col-lg-12 col-md-12">
                <div class="row col-12">
                    <div class="form-group col-sm-5 col-lg-5 col-md-5 col-5 h4">
                        <strong>Ajout d'un département</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.departements.save') }}" method="post">
            	@csrf
            	<div class="row form-group">
                    <div class="col-6">
                        Code département <input type="text" name="code_dep" class="form-control" required value="" >
                    </div>
                    <div class="col-6">
                        Nom département <input type="text" name="nom_dep" class="form-control" required value="" >
                    </div>
                    <div class="col-6">
                        Région du département
                        <select name="region_id" class="form-control" required>
                            <option value="">Sélectionner la région</option>
                            @foreach($regions as $reg)
                            <option value="{{ $reg->id }}">{{ $reg->nomReg }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-1">
                    <div class="row">
                    	<input type="submit" name="update" class="pull-right btn btn-sm btn-primary btn-round" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop