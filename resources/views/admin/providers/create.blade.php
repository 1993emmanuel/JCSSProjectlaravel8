@extends('layouts.admin')
@section('title','Registrar Proveedor')

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
				Registrar Proveedor
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a href="{{route('providers.index')}}">Proveedor</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Registrar Proveedor</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar Proveedor</h4>
                        </div>

                        {!! Form::open(['route'=>'providers.store', 'method'=>'POST']) !!}
                        <div class="row mb-2">
                        	<div class="col-6">
		                        <div class="form-group">
		                        	<label for="name">Nombre</label>
		                        	<input type="text" name="name" id="name" class="form-control" placeholder="Ingresa el nombre del proveedor">
		                        </div>
                        	</div>
                        	<div class="col-6">
		                        <div class="form-group">
		                        	<label for="email">Correo Electronico</label>
		                        	<input type="text" name="email" id="email" class="form-control" placeholder="Ingresa el Email del proveedor">
		                        </div>
                        	</div>
                        </div>

                        <div class="row mb-4">
                        	<div class="col-4">
        						<label for="ruc_number">RUC-NUMBER</label>
        						<div class="input-group mb-3">
            						<div class="input-group-prepend">
                						<span class="input-group-text" id="basic-addon1">
                							<i class="fa fa-id-card" aria-hidden="true"></i>
                						</span>
            						</div>
            						<input type="number" name="ruc_number" id="ruc_number" placeholder="Ingrese el ruc number"
            								class="form-control" aria-describedby="basic-addon1">
            						<small class="float-right text-primary text-uppercase">
            							<strong>el numero-ruc es de 11-digitos solo numeros</strong>
            						</small>
        						</div>
                        	</div>
                        	<div class="col-4">
        						<label for="address">Direccion</label>
        						<div class="input-group mb-3">
            						<div class="input-group-prepend">
                						<span class="input-group-text" id="basic-addon2">
                							<i class="fa fa-map-marker" aria-hidden="true"></i>
                							<i class="fa fa-id-card" aria-hidden="true"></i>
                						</span>
            						</div>
            						<input type="text" name="address" id="address" class="form-control" aria-describedby="basic-addon2" placeholder="Ingresa la direccion del proveedor">
        						</div>
                        	</div>
                        	<div class="col-4">
        						<label for="phone">Telefono/Celular</label>
        						<div class="input-group mb-3">
            						<div class="input-group-prepend">
                						<span class="input-group-text" id="basic-addon3">
                							<i class="fa fa-phone" aria-hidden="true"></i>
                						</span>
            						</div>
            						<input type="number" name="phone" id="phone" class="form-control" aria-describedby="basic-addon3" placeholder="telefono del proveedor">
		                        	<small class="float-right text-primary text-uppercase">
		                        		<strong>el telefono/celular es de 10-caracteres</strong>
		                        	</small>
        						</div>
                        	</div>
                        </div>





                        <button type="submit" class="btn btn-primary mr-2">
                        	<i class="fa fa-plus" aria-hidden="true"></i> Registrar Proveedor
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

