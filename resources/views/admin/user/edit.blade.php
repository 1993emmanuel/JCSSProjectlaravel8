@extends('layouts.admin')
@section('title','Editar Usuario')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('users.index')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver Usuarios</span>
	</a>
</li>
@endsection
@section('options')
{{-- 	<li class="nav-item nav-settings d-none d-lg-block">
		<a href="#" class="nav-link">
			<i class="fab fa-ellipsis-h"></i>
		</a>
	</li> --}}
@endsection


@section('preferences')
	{{-- <div id="right-sidebar" class="settings-panel"></div> --}}
@endsection


@section('content')

				<div class="content-wrapper">
					<div class="page-header">
						<h3 class="page-title">
							Editar Usuario
						</h3>
					</div>
					<nav arial-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
							<li class="breadcrumb-item" aria-current="page">
								<a href="{{route('users.index')}}">Usuario</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
			                        <div class="d-flex justify-content-between">
			                            <h4 class="card-title">Editar Usuario</h4>
			                        </div>

			                        {!! Form::model($user, ['route'=>['users.update',$user], 'method'=>'PUT']) !!}

			                        <div class="row">
			                        	<div class="col-md-6">
											<div class="form-group">
												<label for="name">Nombre</label>
												<input type="text" name="name" id="name" class="form-control" placeholder="Ingrese nombre del usuario" required value="{{$user->name}}">
											</div>
			                        	</div>
			                        	<div class="col-md-6">
											<div class="form-group">
												<label for="email">Correo Electronico</label>
												<input type="email" name="email" id="email" class="form-control" placeholder="Ingresa el correo electronico" required value="{{$user->email}}">
											</div>
			                        	</div>
			                        </div>
			                        <div class="row">
			                        	<div class="col-md-4">
											<div class="form-group">
												<label for="password">Contraseña</label>
												<input type="password" name="password" id="password" class="form-control" placeholder="Ingresa la contraseña">
											</div>
			                        	</div>
			                        	<div class="col-md-4">
											<div class="form-group">
												<label for="username">Nombre de usuario</label>
												<input type="text" name="username" id="username" class="form-control" placeholder="Ingresa tu nombre de usuario" required value="{{$user->username}}">
											</div>
			                        	</div>
			                        	<div class="col-md-4">
											<div class="form-group">
												<label for="role">Seleccione el rol</label>
												<select name="role" id="role" class="form-control">
													<option value="0" selected disabled>seleccione un rol</option>
													@foreach( $roles as $key=>$value)
														<option 
															@if($user->hasRole($value))
																selected
															@endif
															value="{{$key}}">
															{{$value}}
														</option>
													@endforeach
												</select>
											</div>
			                        	</div>
			                        </div>

			                        <button type="submit" class="btn btn-primary mr-2">
			                        	<i class="fa fa-plus" aria-hidden="true"></i> Editar Usuario
			                        </button>
			                        <a class="btn btn-light mr-2" href="{{route('users.index')}}">
			                        	<i class="fa fa-ban" aria-hidden="true"></i> Cancelar
			                        </a>
			                        {!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
				</div>


@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

