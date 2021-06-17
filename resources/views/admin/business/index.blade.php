@extends('layouts.admin')
@section('title','Datos de la empresa')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
{{-- <li class="nav-item d-none d-lg-block">
	<a href="{{route('clients.create')}}" class="nav-link">
		<span class="btn btn-primary">+ Crear Cliente</span>
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
			<h3 class="page-title">
				Empresa
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Datos de la empresa</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Gestion de la empresa</h4>
                        </div>

                        <div class="row">

	                        <div class="form-group col-md-4">
			                  <strong>
			                        <i class="fab fa-product-hunt mr-1"></i>Nombre de la Empresa
			                  </strong>
			                  <p class="text-muted">{{$business->name}}</p>
			                  <hr>
			                  <strong>
			                        <i class="fab fa-product-hunt mr-1"></i>Descripcion
			                  </strong>
			                  <p class="text-muted">{{$business->description}}</p>
			                  <hr>
			                  <strong>
			                        <i class="fab fa-product-hunt mr-1"></i>Correo Electronico
			                  </strong>
			                  <p class="text-muted">{{$business->email}}</p>
			                  <hr>
	                        </div>

	                        <div class="form-group col-md-4">
			                  <strong>
			                        <i class="fab fa-product-hunt mr-1"></i>Direccion de la empresa
			                  </strong>
			                  <p class="text-muted">{{$business->address}}</p>
			                  <hr>
			                  <strong>
			                        <i class="fab fa-product-hunt mr-1"></i>RUC
			                  </strong>
			                  <p class="text-muted">{{$business->ruc}}</p>
			                  <hr>
	                        </div>
                        	
                        	<div class="form-group col-md-4">
                        		<img 
                        			style="width: 50px; height: 50px;" 
                        			src="{{asset('image/'.$business->logo)}}" class="rounded float-left" alt="logo">
                        	</div>
                        </div>
					</div>
					<div class="card-footer">						
						<button type="button"data-toggle="modal" data-target="#exampleModal-2"
								class="btn btn-primary btn-sm float-right">
							Editar Empresa
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
	<div class="modal-dialog" role="document">
  		<div class="modal-content">
    		<div class="modal-header">
      			<h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
      			</button>
    		</div>
      	{!! Form::model($business, ['route'=>['business.update', $business], 'method'=>'PUT', 'files'=>true]) !!}
    		<div class="modal-body">
    			<div class="form-group">
    				<label for="name">Nombre de la empresa</label>
    				<input type="text" name="name" id="name" class="form-control" value="{{$business->name}}">
    			</div>
    			<div class="form-group">
    				<label for="description">Descripcion de la empresa</label>
    				<textarea class="form-control" name="description" id="descripcion" rows="3">{{$business->description}}</textarea>
    			</div>
    			<div class="form-group">
    				<label for="email">Correo de la emrpesa</label>
    				<input type="email" name="email" id="email" class="form-control" value="{{$business->email}}">
    			</div>
    			<div class="form-group">
    				<label for="address">Direccion de la empresa</label>
    				<textarea class="form-control" id="address" name="address" rows="3">{{$business->address}}</textarea>
    			</div>
    			<div class="form-group">
    				<label for="ruc">RUC de la empresa</label>
    				<input type="number" name="ruc" id="ruc" class="form-control" value="{{$business->ruc}}">
    			</div>

    			<div class="form-group">
    				<label for="picture">Logo de la empresa</label>
    				<input type="file" name="picture" id="picture" class="dropify">
    			</div>

    		</div>
    		<div class="modal-footer">
      			<button type="submit" class="btn btn-success">Actualizar</button>
      			<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
    		</div>
    	{!! Form::close() !!}
  		</div>
	</div>
</div>







@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
	{!! Html::script('melody/js/dropify.js') !!}
@endsection

