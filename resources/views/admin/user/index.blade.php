@extends('layouts.admin')
@section('title','Usuarios')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('users.create')}}" class="nav-link">
		<span class="btn btn-primary">+ Crear Usuario</span>
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
				Usuarios
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todas los Usuarios</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Usuarios</h4>
                            {{-- <i class="fas fa-ellipsis-v"></i> --}}
                            <div class="btn-group">
                            	<a data-toggle="dropdown" arial-haspopup="true" aria-expanded="false">
                            		<i class="fas fa-ellipsis-v"></i>
                            	</a>
                            	<div class="dropdown-menu dropdown-menu-right">
                            		<a href="{{route('users.create')}}" class="dropdown-item" type="button">Crear</a>
                            	</div>
                            </div>
                        </div>


						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th>Nombre de usuario</th>
										<th>Rol</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										@if($user->roles->implode('name',',')=='control-maestro')
											{{-- bloqueado bloqueado bloqueado --}}
										@else
											<tr>
												<td scope="row">{{$user->id}}</td>
												<td>
													<a href="{{route('users.show',$user)}}">{{$user->name}}</a>
												</td>
												<td>{{ $user->email }}</td>
												<td>{{ $user->username }}</td>
												<td>{{$user->roles->implode('name', ', ') }}</td>
													<td style="width: 50px;">
													{!!Form::open(['route'=>['users.destroy',$user],'method'=>'DELETE'])!!}
														<a href="{{route('users.edit',$user)}}" title="Editar" 
															class="jsgrid-button jsgrid-edit-button">
																<i class="far fa-edit"></i>
														</a>
														<button href="{{route('users.destroy',$user)}}" title="Eliminar" 
															class="jsgrid-button jsgrid-edit-button" type="submit">
																<i class="far fa-trash-alt"></i>
														</button>
														{!! Form::close() !!}
													</td>
											</tr>
										@endif
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

