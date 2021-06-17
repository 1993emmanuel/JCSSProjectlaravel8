@extends('layouts.admin')
@section('title','Ventas')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('sales.create')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Crear Venta</span>
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
				Ventas
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todas las ventas</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Ventas</h4>
                            {{-- <i class="fas fa-ellipsis-v"></i> --}}
                            <div class="btn-group">
                            	<a data-toggle="dropdown" arial-haspopup="true" aria-expanded="false">
                            		<i class="fas fa-ellipsis-v"></i>
                            	</a>
                            	<div class="dropdown-menu dropdown-menu-right">
                            		<a href="{{route('sales.create')}}" class="dropdown-item" type="button">Crear</a>
                            	</div>
                            </div>
                        </div>

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
									@foreach($sales as $sale)
									<tr>
										<td scope="row">
											<a href="{{route('sales.show',$sale)}}">
												{{$sale->id}}
											</a>
										</td>
										<td>{{ $sale->sale_date }}</td>
										<td>{{ $sale->total }}</td>
										@if($sale->status == 'VALID')
											<td>
												<a href="{{route('sales.change_status',$sale)}}" 
													class="jsgrid-button btn btn-success">
														Valido <i class="fas fa-check"></i>
												</a>
											</td>
										@else
											<td>
												<a href="{{route('sales.change_status',$sale)}}" 
													class="jsgrid-button btn btn-danger">
														Cancelado <i class="fas fa-times"></i>
												</a>
											</td>
										@endif
										{{-- <td>{{ $sale->status }}</td> --}}
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

											<a href="{{route('sales.pdf',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-file-pdf"></i>
											</a>
											<a href="{{route('sales.print',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-print"></i>
											</a>
											<a href="{{route('sales.show',$sale)}}" class="jsgrid-button jsgrid-edit-button">
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

