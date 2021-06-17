@extends('layouts.admin')
@section('title','Reporte por rango de fechas')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
{{-- <li class="nav-item d-none d-lg-block">
	<a href="{{route('sales.create')}}" class="nav-link">
		<span class="btn btn-primary">+ Crear Venta</span>
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
				Reporte por rango de fechas
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">reporte por rango de fechas</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Reporte por rango de fechas</h4>
                            {{-- <i class="fas fa-ellipsis-v"></i> --}}
                            <div class="btn-group">
                            	<a data-toggle="dropdown" arial-haspopup="true" aria-expanded="false">
                            		<i class="fas fa-ellipsis-v"></i>
                            	</a>
                            	<div class="dropdown-menu dropdown-menu-right">
                            	</div>
                            </div>
                        </div>

						{!! Form::open(['route'=>'reports.result', 'method'=>'POST', 'files'=>false]) !!}
                		<div class="row">
                			<div class="col-12 col-md-3 text-center">
                				<span>Fecha de inicial: <b> </b></span>
                				<div class="form-group">
                					<input 
                						type="date" class="form-control" 
                						name="fecha_ini" id="fecha_ini" value="{{old('fecha_ini')}}">
                				</div>
                			</div>
                			<div class="col-12 col-md-3 text-center">
                				<span>Fecha final: <b> </b></span>
                				<div class="form-group">
                					<input 
                						type="date" class="form-control" 
                						name="fecha_fin" id="fecha_fin" value="{{old('fecha_fin')}}">
                				</div>
                			</div>
                			<div class="col-12 col-md-3 text-center mt-4">
                				<div class="form-group">
                					<button type="submit" class="btn btn-primary">Consultar</button>
                				</div>
                			</div>
                			<div class="col-12 col-md-3 text-center">
                				<span>Total de ingresos: <b> </b></span>
                				<div class="form-group">
                					<strong>MX : {{$total}}</strong>
                				</div>
                			</div>
                		</div>

                		{!! Form::close() !!}

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
										<td>{{ $sale->status }}</td>
										<td style="width: 50px;">

											<a href="{{route('sales.pdf',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-file-pdf"></i>
											</a>
											<a href="{{route('sales.print',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-print"></i>
											</a>
											<a href="{{route('sales.show',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fa fa-eye"></i>
											</a>

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
	<script>
		window.onload=function(){
			var fecha = new Date(); //fecha actual
			var mes = fecha.getMonth()+1; //mes actual
			var dia = fecha.getDay(); // obtener el dia
			var year = fecha.getFullYear(); //obtener el año
			if (dia<10){
				dia='0'+dia; // agregar el cero si es menor a diez
			}
			if(mes <10){
				mes='0'+mes //agregar el cero si es menor a diez
			}
			document.getElementById('fecha_fin').value=year+"-"+mes+"-"+dia;
		}
	</script>
@endsection

