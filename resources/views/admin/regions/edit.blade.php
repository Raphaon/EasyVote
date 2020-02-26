@extends("admin.partials.layout")

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-block card-body col-sm-12 col-lg-12 col-md-12">
                <div class="row col-12">
                    <div class="form-group col-sm-5 col-lg-5 col-md-5 col-5 h4">
                        <strong>Editer une région </strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.regions.update') }}" method="post">
            	@csrf
            	<input type="hidden" name="idReg" required value="{{ $region->id }}">
            	<div class="row form-group">
                    <div class="col-6">
                        Code région <input type="text" name="code_reg" class="form-control" required value="{{ @$region->codeReg }}" >
                    </div>
                    <div class="col-6">
                        Nom région <input type="text" name="nom_reg" class="form-control" required value="{{ @$region->nomReg }}" >
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