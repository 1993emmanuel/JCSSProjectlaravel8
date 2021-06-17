@extends('layouts.admin')
@section('title','Compras')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('purchases.create')}}" class="nav-link">
		<span class="btn btn-primary"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Crear Compra</span>
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
				Compras
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todas las compras</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Compras</h4>
                            {{-- <i class="fas fa-ellipsis-v"></i> --}}
                            <div class="btn-group">
                            	<a data-toggle="dropdown" arial-haspopup="true" aria-expanded="false">
                            		<i class="fas fa-ellipsis-v"></i>
                            	</a>
                            	<div class="dropdown-menu dropdown-menu-right">
                            		<a href="{{route('purchases.create')}}" class="dropdown-item" type="button">Crear</a>
                            	</div>
                            </div>
                        </div>

						{{-- protected $fillable = ['provider_id','user_id','purchase_date','tax','total','status','picture']; --}}
						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Fecha de Compra</th>
										<th>Total</th>
										<th>Estatus</th>
										<th style="width: 100px;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($purchases as $purchase)
									<tr>
										<td scope="row">
											<a href="{{route('purchases.show',$purchase)}}">
												{{$purchase->id}}
											</a>
										</td>
										<td>{{ $purchase->purchase_date }}</td>
										<td>{{ $purchase->total }}</td>
										@if($purchase->status == 'ACTIVE')
											<td>
												<a href="{{route('purchases.change_status',$purchase)}}" 
													class="jsgrid-button btn btn-success">
														Activo <i class="fas fa-check"></i>
												</a>
											</td>
										@else
											<td>
												<a href="{{route('purchases.change_status',$purchase)}}" 
													class="jsgrid-button btn btn-danger">
														Cancelado <i class="fas fa-times"></i>
												</a>
											</td>
										@endif
										{{-- <td>{{ $purchase->status }}</td> --}}
										<td style="width: 50px;">
										{{-- {!!Form::open(['route'=>['purchases.destroy',$purchase],'method'=>'DELETE'])!!} --}}
{{-- 											<a href="{{route('purchases.edit',$purchase)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a> --}}
{{-- 											<button href="{{route('purchases.destroy',$purchase)}}" title="Eliminar" 
												class="jsgrid-button jsgrid-edit-button" type="submit">
													<i class="far fa-trash-alt"></i>
											</button> --}}

											<a href="{{route('purchases.pdf',$purchase)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-file-pdf"></i>
											</a>
											<a href="" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-print"></i>
											</a>
											<a href="{{route('purchases.show',$purchase)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-eye"></i>
											</a>

											{{-- {!! Form::close() !!} --}}
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

