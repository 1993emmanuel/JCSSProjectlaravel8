@extends('layouts.admin')
@section('title','Registrar Usuario')

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
							Registrar Usuario
						</h3>
					</div>
					<nav arial-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
							<li class="breadcrumb-item" aria-current="page">
								<a href="{{route('users.index')}}">Usuario</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Registrar Usuario</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
			                        <div class="d-flex justify-content-between">
			                            <h4 class="card-title">Registrar Usuario</h4>
			                        </div>

			                        {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}
			                        @include('admin.user._form')

			                        <button type="submit" class="btn btn-primary mr-2">Registrar Usuario</button>
			                        <a class="btn btn-light mr-2" href="{{route('users.index')}}">Cancelar</a>
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

