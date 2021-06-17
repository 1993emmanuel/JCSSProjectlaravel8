@extends('layouts.admin')

@section('title','Ventas Detalles')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('sales.index')}}" class="nav-link">
			<span class="btn btn-primary">Ver Ventas</span>
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
            <h3 class="page-title">Detalles Ventas</h3>
        </div>
        <nav arial-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de la Venta</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mt-1 bg-primary text-white p-3 lead">
                            Venta hecha por: {{$sale->user->name}}
                        </h4>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-3 text-center">
                                <label class="form-control-label" for="nombre">Cliente</label>
                                <p class="text-muted">
                                    <a href="{{route('clients.show',$sale->client)}}">{{$sale->client->name}}</a>
                                </p>
                            </div>
                            <div class="col-md-3 text-center">
                                <label class="form-control-label" for="num_compra">Numero de Venta</label>
                                <p class="text-muted">{{$sale->id}}</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <label class="form-control-label" for="nombre">Correo Cliente</label>
                                <p class="text-muted">{{$sale->client->email}}</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <label class="form-control-label" for="nombre">Telefono/Celular</label>
                                <p class="text-muted">{{$sale->client->phone}}</p>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group row">
                            <h4 class="card-title ml-3">Detalle Venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio Venta(MX)</th>
                                            <th>Descuento</th>
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
                                                <p align="right">TOTAL IMPUESTO ({{$sale->tax}}%)</p>
                                            </th>
                                            <th>
                                                <p align="right">S/{{number_format($subtotal*$sale->tax/100,2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3"><p align="right">TOTAL</p></th>
                                            <th>
                                                <p align="right">S/{{number_format($sale->total,2)}}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($saleDetails as $saleDetail)
                                            <tr>
                                                <td>{{$saleDetail->product->name}}</td>
                                                <td>{{$saleDetail->price}}</td>
                                                <td>{{$saleDetail->discount}}</td>
                                                <td>{{$saleDetail->quantity}}</td>
                                                <td>
                                                    S//{{number_format($saleDetail->quantity*$saleDetail->price,2)}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('sales.index')}}" class="btn btn-primary float-right">Regresar</a>
                    </div>

                </div>
            </div>
        </div>
      </div>
@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

