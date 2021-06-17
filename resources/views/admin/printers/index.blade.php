@extends('layouts.admin')
@section('title','Datos de la Impresora')

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
				Impresora
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Datos de la Impresora</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Gestion de la Impresora</h4>
                        </div>

                        <div class="row">

	                        <div class="form-group col-md-4">
			                  	<strong>
			                    	<i class="fa fa-print mr-1"></i>Nombre de la Impresora
			                  	</strong>
			                  	<p class="text-muted">{{$printers->name}}</p>
			                	<hr>
	                        </div>

                        </div>
					</div>
					<div class="card-footer">						
						<button type="button"data-toggle="modal" data-target="#exampleModal-2"
								class="btn btn-primary btn-sm float-right">
							<i class="fa fa-print"></i> Editar Impresora
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
      			<h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de la Impresora</h5>
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
      			</button>
    		</div>
      	{!! Form::model($printers, ['route'=>['printers.update', $printers], 'method'=>'PUT', 'files'=>false]) !!}
    		<div class="modal-body">
    			<div class="form-group">
    				<i class="fa fa-print"> <label for="name"> Nombre de la impresora</label></i>
    				<input type="text" name="name" id="name" class="form-control" value="{{$printers->name}}">
    			</div>
    		</div>
    		<div class="modal-footer">
      			<button type="submit" class="btn btn-success">
      				<i class="fa fa-print"></i> Actualizar
      			</button>
      			<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
    		</div>
    	{!! Form::close() !!}
  		</div>
	</div>
</div>







@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
{{-- 	{!! Html::script('melody/js/dropify.js') !!} --}}
@endsection

