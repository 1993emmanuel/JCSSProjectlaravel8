@extends('layouts.admin')
@section('title','Editar Proveedor')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('providers.index')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver Proveedores</span>
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
				Editar Proveedor
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a href="{{route('providers.index')}}">Proveedor</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Proveedor</h4>
                        </div>

                        {!! Form::model($provider,['route'=>['providers.update',$provider], 'method'=>'PUT']) !!}

                        <div class="row">
                        	<div class="col-md-6">
		                        <div class="form-group">
		                        	<label for="name">Nombre</label>
		                        	<input type="text" name="name" id="name" class="form-control" placeholder="Ingresa el nombre del proveedor" value="{{$provider->name}}">
		                        </div>
                        	</div>
                        	<div class="col-md-6">
		                        <div class="form-group">
		                        	<label for="email">Correo Electronico</label>
		                        	<input type="text" name="email" id="email" class="form-control" placeholder="Ingresa el Email del proveedor" value="{{$provider->email}}">
		                        </div>
                        	</div>
                        </div>

                        <div class="row mb-4">
                        	<div class="col-md-4">
		                        <div class="form-group">
		                        	<label for="ruc_number">RUC-NUMBER</label>
		                        	<input type="number" name="ruc_number" id="ruc_number" class="form-control" placeholder="Ingresa el ruc number" value="{{$provider->ruc_number}}">
		                        	<small class="float-right text-primary text-uppercase">
		                        		<strong>el ruc es de 11-caracteres</strong>
		                        	</small>
		                        </div>
                        	</div>
                        	<div class="col-md-4">
		                        <div class="form-group">
		                        	<label for="address">Direccion</label>
		                        	<input type="text" name="address" id="address" class="form-control" placeholder="Ingresa la direccion del proveedor" value="{{$provider->address}}">
		                        </div>
                        	</div>
                        	<div class="col-md-4">
		                        <div class="form-group">
		                        	<label for="phone">Telefono/Celular</label>
		                        	<input type="number" name="phone" id="phone" class="form-control" placeholder="Ingresa el celular del proveedor" value="{{$provider->phone}}">
		                        	<small class="float-right text-primary text-uppercase">
		                        		<strong>el telefono/celular es de 10-caracteres</strong>
		                        	</small>
		                        </div>
                        	</div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">
                        	<i class="fa fa-plus" aria-hidden="true"></i> Editar Proveedor
                        </button>
                        <a class="btn btn-light mr-2" href="{{route('providers.index')}}">
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

