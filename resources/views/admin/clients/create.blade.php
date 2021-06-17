@extends('layouts.admin')
@section('title','Registrar Cliente')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('clients.index')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver Clientes</span>
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
				Registrar Cliente
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a href="{{route('clients.index')}}">Cliente</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Registrar Cliente</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar Cliente</h4>
                        </div>

                        {!! Form::open(['route'=>'clients.store', 'method'=>'POST', 'files'=>false ]) !!}
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Nombre del Cliente</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="nombre del cliente" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="dni">DNI</label>
									<input type="number" name="dni" id="dni" class="form-control" placeholder="DNI del cliente" required>
		                        	<small class="float-right text-primary text-uppercase">
		                        		<strong>el dni es de 9-caracteres numericos</strong>
		                        	</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="ruc">RUC</label>
									<input type="number" name="ruc" id="ruc" class="form-control" placeholder="RUC del cliente" required>
		                        	<small class="float-right text-primary text-uppercase">
		                        		<strong>el ruc es de 11-caracteres numericos</strong>
		                        	</small>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="address">Direccion del cliente</label>
									<input type="text" name="address" id="address" class="form-control" placeholder="Direccion del cliente" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Telefono/Celular</label>
									<input type="number" name="phone" id="phone" class="form-control" placeholder="Telefono/Celular del cliente" required>
		                        	<small class="float-right text-primary text-uppercase">
		                        		<strong>el telefono-celular es de 10-caracteres</strong>
		                        	</small>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="email">Correo Electronico</label>
									<input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico" required>
								</div>
							</div>
						</div>




                        <button type="submit" class="btn btn-primary mr-2">
                        	<i class="fa fa-plus" aria-hidden="true"></i> Registrar Cliente
                        </button>
                        <a class="btn btn-light mr-2" href="{{route('products.index')}}">
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

