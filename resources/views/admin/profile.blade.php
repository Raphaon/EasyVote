@extends("admin.partials.layout")

@section('content')
<div class="content">
	<style>
		.h6{
			font-size: 0.7rem !important;
		}
	</style>
	<!-- Animated -->
	<div class="animated fadeIn">
		<!-- /To Do and Live Chat -->
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title box-title">Mes informations</h4>
						<form class="card-content" action="{{ route('admin.update_profile') }}" method="post">
							@csrf
							<div class="row form-group">
			                    <div class="col-12">
			                        Entrez votre nom <span class="text-danger">*</span> <input type="text" name="name" class="form-control" required value="{{ $admin->name }}" >

			                        @if ($errors->has('name'))
		                                <span class="text-danger h6" role="alert">
		                                    <strong>{{ $errors->first('name') }}</strong>
		                                </span>
		                            @endif
			                    </div>
			                </div>
							<div class="row form-group">
			                    <div class="col-12">
			                        Entrez votre email <span class="text-danger">*</span> <input type="text" name="email" class="form-control" required value="{{ $admin->email }}" >

			                        @if ($errors->has('email'))
		                                <span class="text-danger h6" role="alert">
		                                    <strong>{{ $errors->first('email') }}</strong>
		                                </span>
		                            @endif
			                    </div>
			                </div>
							<div class="row form-group">
			                    <div class="col-12">
			                        Entrez le mot de passe actuel <span class="text-danger">*</span> <input type="password" name="actual_password" class="form-control">

			                        @if ($errors->has('actual_password'))
		                                <span class="text-danger h6" role="alert">
		                                    <strong>{{ $errors->first('actual_password') }}</strong>
		                                </span>
		                            @endif
			                    </div>
			                </div>
			                <hr>
							<div class="row form-group">
			                    <div class="col-6">
			                        Entrez le nouveau mot de passe <input type="password" name="password" class="form-control">

			                        @if ($errors->has('password'))
		                                <span class="text-danger h6" role="alert">
		                                    <strong>{{ $errors->first('password') }}</strong>
		                                </span>
		                            @endif
			                    </div>
			                    <div class="col-6">
			                        Vérifiez le nouveau mot de passe <input type="password" name="password_verification" class="form-control">

			                        @if ($errors->has('password_verification'))
		                                <span class="text-danger h6" role="alert">
		                                    <strong>{{ $errors->first('password_verification') }}</strong>
		                                </span>
		                            @endif
			                    </div>
			                </div>
							<div class="row form-group">
			                    <div class="col-12">
			                        <input type="submit" name="save" value="Sauvegarder" class="btn btn-success pull-right">
			                    </div>
			                </div>
						</form>
					</div> <!-- /.card-body -->
				</div><!-- /.card -->
			</div>

			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title box-title">Photo de profile</h4>
						<form class="card-content" action="{{ route('admin.update_profileThumb') }}" method="post" enctype="multipart/form-data">
							@csrf
		                    <div class="row form-group m-4">
		                        <div class="col-6 view_r">@if(!is_null($admin->getProfileAttribute())) <img src="{{ $admin->getProfileAttribute() }}" alt=""> @endif</div>
		                    </div>
							<div class="row form-group">
			                    <div class="col-12">
			                        Choisissez votre photo de profile <span class="text-danger">*</span> <input id="featured_recto" type="file" name="thumb" class="form-control" required value="" >
			                    </div>
			                </div>
							<div class="row form-group">
			                    <div class="col-12">
			                        <input type="submit" name="save" value="Sauvegarder" class="btn btn-success pull-right">
			                    </div>
			                </div>
						</form>
					</div> <!-- /.card-body -->
				</div><!-- /.card -->
			</div>
		</div>
	</div>
	<!-- .animated -->
</div>
@stop