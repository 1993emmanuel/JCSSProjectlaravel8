@extends('layouts.admin')
@section('title','Clientes')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('clients.create')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Crear Cliente</span>
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
				Clientes
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todos los Clientes</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Clientes</h4>
                            {{-- <i class="fas fa-ellipsis-v"></i> --}}
                            <div class="btn-group">
                            	<a data-toggle="dropdown" arial-haspopup="true" aria-expanded="false">
                            		<i class="fas fa-ellipsis-v"></i>
                            	</a>
                            	<div class="dropdown-menu dropdown-menu-right">
                            		<a href="{{route('clients.create')}}" class="dropdown-item" type="button">Crear</a>
                            	</div>
                            </div>
                        </div>

						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>DNI</th>
										<th>Celular/Telefono</th>
										<th>Correo Electronico</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($clients as $client)
									<tr>
										<td scope="row">{{$client->id}}</td>
										<td>
											<a href="{{route('clients.show',$client)}}">{{$client->name}}</a>
										</td>
										<td>{{ $client->dni }}</td>
										<td>{{ $client->phone }}</td>
										<td>{{ $client->email }}</td>
										<td style="width: 50px;">
										{!!Form::open(['route'=>['clients.destroy',$client],'method'=>'DELETE'])!!}
											<a href="{{route('clients.edit',$client)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a>

											@if( auth()->user()->roles->implode('name',', ') == 'control-maestro' )
												<button href="{{route('clients.destroy',$client)}}" title="Eliminar" 
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

