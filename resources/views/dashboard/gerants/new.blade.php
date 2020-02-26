@extends('dashboard.partials.layout')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-block card-body col-sm-12 col-lg-12 col-md-12">
                <div class="row col-12">
                    <div class="form-group col-sm-5 col-lg-5 col-md-5 col-5 h4">
                        <strong>Ajout d'une région</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.gestionnaires.save') }}" method="post">
            	@csrf
            	<div class="row form-group">
                    <div class="col-6">
                        Entrez le nom du gérant<span class="text-danger">*</span> <input type="text" name="name" class="form-control" required value="" >
                    </div>
                    <div class="col-6">
                        Entrez l'email<span class="text-danger">*</span> <input type="text" name="email" class="form-control" required value="" >
                    </div>
                    <div class="col-6">
                        <?php
                            $pass = "password".rand(1000,9999);
                        ?>
                        Entrez le mot de passe <span class="text-danger">ou laisser vide pour '{{ $pass }}'</span> <input type="password" name="password" class="form-control" value="{{ $pass }}" required>
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