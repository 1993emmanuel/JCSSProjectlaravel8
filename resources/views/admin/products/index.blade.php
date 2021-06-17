@extends('layouts.admin')
@section('title','Productos')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('products.create')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Crear Producto</span>
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
				Productos
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todos los Productos</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos</h4>
                            {{-- <i class="fas fa-ellipsis-v"></i> --}}
                            <div class="btn-group">
                            	<a data-toggle="dropdown" arial-haspopup="true" aria-expanded="false">
                            		<i class="fas fa-ellipsis-v"></i>
                            	</a>
                            	<div class="dropdown-menu dropdown-menu-right">
                            		<a href="{{route('products.create')}}" class="dropdown-item" type="button">Crear</a>
                            	</div>
                            </div>
                        </div>

						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>STOCK</th>
										<th>Estatus</th>
										<th>Categoria</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td scope="row">{{$product->id}}</td>
										<td>
											<a href="{{route('products.show',$product)}}">{{$product->name}}</a>
										</td>
										<td>{{ $product->stock }}</td>
										@if($product->status == 'ACTIVE')
											<td>
												<a href="{{route('products.change_status',$product)}}" 
													class="jsgrid-button btn btn-success">
														Activo <i class="fas fa-check"></i>
												</a>
											</td>
										@else
											<td>
												<a href="{{route('products.change_status',$product)}}" 
													class="jsgrid-button btn btn-danger">
														Desactivado <i class="fas fa-times"></i>
												</a>
											</td>
										@endif
										<td>{{ $product->category->name }}</td>
										<td style="width: 50px;">
										{!!Form::open(['route'=>['products.destroy',$product],'method'=>'DELETE'])!!}
											<a href="{{route('products.edit',$product)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a>
											@if(auth()->user()->roles->implode('name',', ') == 'control-maestro' )
												<button href="{{route('products.destroy',$product)}}" title="Eliminar" 
													class="jsgrid-button jsgrid-edit-button" type="submit">
														<i class="far fa-trash-alt"></i>
												</button>
											@endif
											{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

