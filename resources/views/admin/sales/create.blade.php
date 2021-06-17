@extends('layouts.admin')
@section('title','Crear Compra')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('sales.index')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver Ventas</span>
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
				Registrar Ventas
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a href="{{route('sales.index')}}">Ventas</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Registrar Ventas</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        {!! Form::open(['route'=>'sales.store', 'method'=>'POST']) !!}
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registrar Ventas</h4>
                        </div>

                        
                        @include('admin.sales._form')

					</div>
						<div class="card-footer text-muted">
	                        <button id="guardar" type="submit" class="btn btn-primary mr-2">
	                        	<i class="fa fa-plus" aria-hidden="true"></i> Registrar Venta
	                        </button>
	                        <a class="btn btn-light mr-2" href="{{route('sales.index')}}">
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

		var cont = 1;
		let total= 0;
		let subtotal = [];
		$('#guardar').hide();
		$('#product_id').change(mostrarValores);

		function mostrarValores(){
			datosProducto = document.getElementById('product_id').value.split('_');
			$('#price').val(datosProducto[2]);
			$('#stock').val(datosProducto[1]);
		}

		function agregar(){
			datosProducto = document.getElementById('product_id').value.split('_');
			product_id = datosProducto[0];
			producto = $('#product_id option:selected').text();
			quantity = $('#quantity').val();
			discount = $('#discount').val();
			price = $('#price').val();
			stock = $('#stock').val();
			impuesto = $('#tax').val();
			if(product_id !="" && quantity !="" && quantity>0 && discount!="" && price!="" ){
				if(parseInt(stock) > parseInt(quantity) ){
					subtotal[cont] = (quantity * price) - (quantity * price * discount/100);
					total = total + subtotal[cont];
					var fila ='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-times fa-2x"></i></button></td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td><td><input type="hidden" name="price[]" value="'+parseFloat(price).toFixed(2)+'"><input type="number" class="form-control" value="'+parseFloat(price).toFixed(2)+'" disabled></td><td><input type="hidden" name="discount[]" value="'+parseFloat(discount)+'"><input type="number" class="form-control" value="'+parseFloat(discount)+'" disabled></td><td><input type="hidden" name="quantity[]" value="'+quantity+'" ><input type="number" value="'+quantity+'" class="form-control" disabled></td><td align="right">S//'+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
					cont++;
					limpiar()
					totales();
					evaluar();
					$('#detalles').append(fila);
				}else{
					// alert('La cantidad supera al stock');
					Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: 'la cantidad supera al stock!!!',
					});
				}
			}else{
				alert('Rellene todos los campos del detalle de venta');
			}
		}

		function limpiar(){
			$('#quantity').val('');
			$('#discount').val('0');
			$('#price').val('');
		}

		function totales(){
			$('#total').html('MX '+total.toFixed(2));
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
			$('#total').html("MX ",total);
			$('#total_impuesto').html('MX ',total_impuesto);
			$('#total_pagar_html').html('MX ', total_pagar_html);
			$('#total_pagar').val(total_pagar_html.toFixed(2));

			$('#fila'+index).remove();
			evaluar();
		}

	</script>	

@endsection

