@extends('layouts.admin')

@section('title','Clientes Detalles')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('clients.index')}}" class="nav-link">
			<span class="btn btn-primary">Ver Clientes</span>
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
			<h3 class="page-title">Detalles Cliente</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
				<li class="breadcrumb-item active" aria-current="page">
                              Detalles del Cliente {{$client->name}}
                        </li>
			</ol>
		</nav>
            <div class="row">
                  <div class="col-12">
                        <div class="card">
                              <div class="card-body">
                                    <div class="row">
                                          <div class="col-lg-4">
                                                <div class="border-bottom text-center pb-4">
                                                      <h3>{{$client->name}}</h3>
                                                      <div class="d-flex justify-content-between"></div>
                                                </div>
                                                <div class="border-bottom py-4">
                                                      <div class="list-group">
                                                            <button type="button" class="list-group-item list-group-item-action active">
                                                                  Sobre Cliente
                                                            </button>
                                                            <button class="list-group-item list-group-item-action">
                                                                  Historial de Compras
                                                            </button>
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="col-lg-6 pl-lg-6">
                                                <div class="d-flex justify-content between">
                                                      <div>
                                                            <h4>Informacion del Cliente</h4>
                                                      </div>
                                                </div>
                                                <div class="profile-feed">
                                                      <div class="d-flex align-items-start profile-feed-item">
                                                            
                                                            <div class="form-group col-md-6">
                                                                  <strong>
                                                                        <i class="fab fa-product-hunt mr-1"></i>Nombre
                                                                  </strong>
                                                                  <p class="text-muted">{{$client->name}}</p>
                                                                  <hr>
                                                                  <strong>
                                                                        <i class="far fa-address-card mr-1"></i>RUC
                                                                  </strong>
                                                                  <p class="text-muted">{{$client->ruc}}</p>
                                                                  <strong>
                                                                        <i class="far fa-address-card mr-1"></i>DNI
                                                                  </strong>
                                                                  <p class="text-muted">{{$client->dni}}</p>
                                                                  <hr>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                  <strong>
                                                                        <i class="fas fa-mobile-alt mr-1"></i>Telefono/Celular
                                                                  </strong>
                                                                  <p class="text-muted">{{$client->phone}}</p>
                                                                  <hr>
                                                                  <strong>
                                                                        <i class="far fa-envelope mr-1"></i>Correo
                                                                  </strong>
                                                                  <p class="text-muted">{{$client->email}}</p>
                                                                  <hr>
                                                                  <strong>
                                                                        <i class="fas fa-map-marked-alt mr-1"></i>Direccion
                                                                  </strong>
                                                                  <p class="text-muted">{{$client->address}}</p>
                                                                  <hr>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>

                              <div class="card-footer text-muted">
                                    <a href="{{route('clients.index')}}" class="btn btn-primary float-right">Regresar</a>
                              </div>
                        </div>
                  </div>
            </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between"></div>
                            <div class="col-md-12">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center lead">Todas las compras del usaurio</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha de venta</th>
                                                        <th>Total</th>
                                                        <th>Impuestos</th>
                                                        <th>Estatus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sales as $sale)
                                                        <tr 
                                                            @if($sale->status == 'VALID')
                                                                class="bg-success"
                                                            @else
                                                                class="bg-danger"
                                                            @endif
                                                        >
                                                            <td>{{$sale->id}}</td>
                                                            <td>{{$sale->sale_date}}</td>
                                                            <td>{{$sale->total}}</td>
                                                            <td>{{$sale->tax}}</td>
                                                            <td>{{$sale->status}}</td>
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
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between"></div>
                            <div class="col-md-12">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center lead">Detalle de sus compras</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table id="order-listing" class="table text-muted">
                                                <thead>
                                                    <tr>
                                                        <th>Id venta</th>
                                                        <th>Producto</th>
                                                        <th>Cantidad Comprada</th>
                                                        <th>Precio</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    @foreach($detallesVeta as $detalleVenta)
                                                        @foreach($detalleVenta as $detalleVenta)
                                                            <tr>
                                                                <td>{{$detalleVenta->id}}</td>
                                                                <td>{{$detalleVenta->product->name}}</td>
                                                                <td>{{$detalleVenta->quantity}}</td>
                                                                <td>{{$detalleVenta->price}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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

{{--                               ---
                              @foreach($detallesVeta as $detalleVenta)
                                @foreach($detalleVenta as $detalleVenta)
                                    {{$detalleVenta}}
                                @endforeach
                              @endforeach
                              <hr>
          "id" => 4
          "sale_id" => 4
          "product_id" => 2
          "quantity" => 90
          "price" => "5.50"
          "discount" => "0.00"
          "created_at" => "2021-06-04 21:29:14"
          "updated_at" => "2021-06-04 21:29:14"
                              -- --}}

{{-- [{"id":1,"client_id":1,"user_id":4,"sale_date":"2021-06-07 16:45:09","tax":"18.00","total":"118.00","status":"VALID","created_at":"2021-06-02T21:45:09.000000Z","updated_at":"2021-06-04T17:37:31.000000Z"},{"id":4,"client_id":1,"user_id":4,"sale_date":"2021-06-04 16:29:14","tax":"18.00","total":"584.10","status":"CANCELED","created_at":"2021-06-04T21:29:14.000000Z","updated_at":"2021-06-04T21:32:04.000000Z"}]   --}}


{{--                         <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td scope="row">{{$category->id}}</td>
                                        <td>
                                            <a href="{{route('categories.show',$category)}}">{{$category->name}}</a>
                                        </td>
                                        <td>{{ $category->description }}</td>
                                            <td style="width: 50px;">
                                            {!!Form::open(['route'=>['categories.destroy',$category],'method'=>'DELETE'])!!}
                                                <a href="{{route('categories.edit',$category)}}" title="Editar" 
                                                    class="jsgrid-button jsgrid-edit-button">
                                                        <i class="far fa-edit"></i>
                                                </a>
                                                <button href="{{route('categories.destroy',$category)}}" title="Eliminar" 
                                                    class="jsgrid-button jsgrid-edit-button" type="submit">
                                                        <i class="far fa-trash-alt"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}