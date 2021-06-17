@extends('layouts.admin')
@section('title','Editar Producto')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('products.index')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver Productos</span>
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
				Editar Producto
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a href="{{route('products.index')}}">Producto</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Editar Producto</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Producto</h4>
                        </div>
						
                        {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT', 'files'=>true]) !!}

                        <div class="row">
                        	<div class="col-md-6">
								<div class="form-group">
									<label for="name">Nombre del producto</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="nombre del producto" value="{{$product->name}}">
								</div>
                        	</div>
                        	<div class="col-md-6">
								<div class="form-group">
									<label for="sell_price">Precio de Venta</label>
									<input type="text" name="sell_price" id="sell_price" class="form-control" placeholder="ingrese precio del producto" value="{{$product->sell_price}}" >
								</div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-md-6">
								<div class="form-group">
									<label for="category_id">Categoria</label>
									<select class="form-control" name="category_id" id="category_id">
										@foreach($categories as $category)
											<option value="{{$category->id}}"
												@if($category->id == $product->category_id)
													selected
												@endif
												>
												{{$category->name}}
											</option>
										@endforeach
									</select>
								</div>
                        	</div>
                        	<div class="col-md-6">
								<div class="form-group">
									<label for="provider_id">Proveedor</label>
									<select class="form-control" name="provider_id" id="provider_id">
										@foreach($providers as $provider)
											<option value="{{$provider->id}}"
												@if( $provider->id == $product->provider_id )
													selected 
												@endif
												>
												{{$provider->name}}
											</option>
										@endforeach
									</select>
								</div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-md-12">
		                      	<div class="card-body">
		                            <h4 class="card-title d-flex">Imagen del Producto
		                                  <small class="ml-auto align-self-end">
		                                        <a href="" class="font-weight-light" target="_blank">
		                                              Seleccionar Archivo
		                                        </a>
		                                  </small>
		                            </h4>
		                            <input type="file" class="dropify" name="picture" id="picture">
		                      	</div>
                        	</div>
                        </div>




                        <button type="submit" class="btn btn-primary mr-2">
                        	<i class="fa fa-plus" aria-hidden="true"></i> Editar Producto
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
	{{-- {!! Html::script('melody/js/data-table.js') !!} --}}
	{!! Html::script('melody/js/dropify.js') !!}
@endsection

