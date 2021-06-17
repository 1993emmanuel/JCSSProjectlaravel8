@extends('layouts.admin')
@section('title','Registrar Compra')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('purchases.index')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver Compras</span>
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
				Registrar Compra
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a href="{{route('purchases.index')}}">Compras</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Registrar Compras</li>
			</ol>
		</nav>
		<div class="row border-primary">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        {!! Form::open(['route'=>'purchases.store', 'method'=>'POST']) !!}
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar Compras</h4>
                        </div>

                        
                        @include('admin.purchases._form')

					</div>
						<div class="card-footer text-muted">
	                        <button id="guardar" type="submit" class="btn btn-primary mr-2">
	                        	<i class="fa fa-cart-plus"></i> Registrar Compra
	                        </button>
	                        <a class="btn btn-light mr-2" href="{{route('purchases.index')}}">
	                        	<i class="fa fa-ban" aria-hidden="true"></i> Cancelar
	                        </a>
						</div>
					   	{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		$(document).ready(function(){
			$('#agregar').click(function(){
				agregar();
			});
		});

		var cont = 0;
		total = 0;
		subtotal = [];

		$('#guardar').hide();

		function agregar(){
			product_id = $('#product_id').val();
			producto = $('#product_id option:selected').text();
			quantity  = $('#quantity').val();
			price = $('#price').val();
			impuesto = $('#tax').val();

			if(product_id != "" && quantity != "" && quantity >0 && price != "" ){
				subtotal[cont] = quantity * price;
				total = total + subtotal[cont];
				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td><td><input type="hidden" id="price[]" name="price[]" value="'+price+'"><input type="number" id="price[]" class="form-control" disabled value="'+price+'"></td><td><input type="hidden" name="quantity[]" value="'+quantity+'"><input class="form-control" type="number" value="'+quantity+'" disabled></td><td align="right">s/'+subtotal[cont]+'</td></tr>';
				cont++;
				limpiar();
				totales();
				evaluar();
				$('#detalles').append(fila);
			}else{
				// Swal.fire({
				// 	type: 'error',
				// 	text : 'Rellene todos los campos del detalle de compras',
				// });
				alert('Rellene todos los campos del detalle de comrpas');
			}
		}

		function limpiar(){
			$('#quantity').val('');
			$('#price').val('');
		}

		function totales(){
			$('#total').html('MX'+total.toFixed(2));
			total_impuesto = total * impuesto/100;
			total_pagar = total + total_impuesto;
			$('#total_impuesto').html('MX '+total_impuesto.toFixed(2));
			$('#total_pagar_html').html('MX '+total_pagar.toFixed(2));
			$('#total_pagar').val(total_pagar.toFixed(2));
		}

		function evaluar(){
			if(total>0){
				$('#guardar').show();
			}else{
				$('#guardar').hide();
			}
		}

		function eliminar(index){
			total = total - subtotal[index];
			total_impuesto = total * impuesto/100;
			total_pagar_html = total + total_impuesto;
			$('#total').html("MX "+total);
			$('#total_impuesto').html("MX "+total_impuesto);
			$('#total_pagar_html').html('MX'+total_pagar_html);
			$('#total_pagar').val(total_pagar_html.toFixed(2));
			$('#fila'+index).remove();
			evaluar();
		}

	</script>

@endsection

