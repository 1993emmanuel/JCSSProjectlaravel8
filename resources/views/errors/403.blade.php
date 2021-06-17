@extends('layouts.admin')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
{{-- <li class="nav-item d-none d-lg-block">
	<a href="{{route('users.create')}}" class="nav-link">
		<span class="btn btn-primary">+ Crear Usuario</span>
	</a>
</li> --}}
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
			{{-- <h1 class="page-title text-danger">Error</h1> --}}
		</div>
		<div class="row">
			<div class="col-12">
				<h1 class="text-center text-bold text-uppercase text-danger p-5">
					<i class="fa fa-exclamation-circle fa-5x" aria-hidden="true"></i>
				</h1>
				<h1 class="text-center text-bold text-uppercase text-danger">
					lo siento no tienes permisos para esta seccion
				</h1>
			</div>
		</div>
	</div>
@endsection