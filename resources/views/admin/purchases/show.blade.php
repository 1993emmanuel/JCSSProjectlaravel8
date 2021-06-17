@extends('layouts.admin')

@section('title','Compras Detalles')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('purchases.index')}}" class="nav-link">
			<span class="btn btn-primary">Ver Compras</span>
		</a>
	</li>
@endsection

@section('options')
@endsection

@section('preference')
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Detalles Compras</h3>
        </div>
        <nav arial-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de la Compra</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6 text-center">
                                <label class="form-control-label" for="nombre">Proveedor</label>
                                <p class="text-muted">{{$purchase->provider->name}}</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <label class="form-control-label" for="num_compra">Numero de Compra</label>
                                <p class="text-muted">{{$purchase->id}}</p>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group row">
                            <h4 class="card-title ml-3">Detalle Compra</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio(MX)</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal(MX)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">
                                                <p align="right">SUBTOTAL</p>
                                            </th>
                                            <th>
                                                <p align="right">S/{{number_format($subtotal,2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <p align="right">TOTAL IMPUESTO ({{$purchase->tax}}%)</p>
                                            </th>
                                            <th>
                                                <p align="right">S/{{number_format($subtotal*$purchase->tax/100,2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3"><p align="right">TOTAL</p></th>
                                            <th>
                                                <p align="right">S/{{number_format($purchase->total,2)}}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($purchaseDetails as $purchaseDetail)
                                            <tr>
                                                <td>{{$purchaseDetail->product->name}}</td>
                                                <td>{{$purchaseDetail->price}}</td>
                                                <td>{{$purchaseDetail->quantity}}</td>
                                                <td>
                                                    S//{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('purchases.index')}}" class="btn btn-primary float-right">Regresar</a>
                    </div>

                </div>
            </div>
        </div>
      </div>
@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

