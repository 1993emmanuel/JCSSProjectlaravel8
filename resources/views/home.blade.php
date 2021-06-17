@extends('layouts.admin')
@section('title','Panel Administrador')

@section('styles')
    {{-- CSS adicionales --}}
@endsection

@section('create')
{{-- <li class="nav-item d-none d-lg-block">
    <a href="{{route('categories.create')}}" class="nav-link">
        <span class="btn btn-primary">+ Crear Categoria</span>
    </a>
</li> --}}
@endsection
@section('options')
{{--    <li class="nav-item nav-settings d-none d-lg-block">
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
            <h3 class="page-title text-uppercase">Panel Administrador de {{$business[0]->name}}</h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between"></div>
                        @foreach($totales  as $total)
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-success">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-cart-arrow-down fa-4x"></i>
                                            </div>
                                            <div class="text-value h4">
                                                <strong>MX: {{$total->totalcompra}} (MES ACTUAL)</strong>
                                            </div>
                                            <div class="h3">Compras</div>
                                        </div>
                                        <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                            <a href="{{route('purchases.index')}}" class="small-box-footer h4">Compras
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-info">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-shopping-cart fa-4x"></i>
                                            </div>
                                            <div class="text-value h4">
                                                <strong>MX: {{$total->totalventa}} (MES ACTUAL)</strong>
                                            </div>
                                            <div class="h3">Ventas</div>
                                            <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                                <a href="{{route('sales.index')}}" class="small-box-footer h4 text-white">
                                                    Ventas
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center">compras - meses</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="compras"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center">ventas - meses</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="ventas"></canvas>
                                        </div>
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
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos más vendidos</h4>
                        </div>
                        <div class="card-body scroll scroll_dark pt-0" style="max-height: 350px;">
                            <div class="datatable-wrapper table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th>Nombre</th>
                                            <th>Codigo</th>
                                            <th>Stock</th>
                                            <th>Cantidad</th>
                                            <th>ver Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productosvendidos as $productosvendido)
                                        <tr>
                                            <td>{{$productosvendido->id}}</td>
                                            <td>{{$productosvendido->name}}</td>
                                            <td>{{$productosvendido->code}}</td>
                                            <td><b>{{$productosvendido->stock}} Utilidades</b></td>
                                            <td><b>{{$productosvendido->quantity}} Unidades</b></td>
                                            <td>
                                                <a href="{{route('products.show',$productosvendido->id)}}">
                                                    <i class="far fa-eye"></i>
                                                    Ver detalles
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


    </div>
@endsection

@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
    {!! Html::script('melody/js/chart.js') !!}

    <script>
        $(function(){
            var varCompra = document.getElementById('compras').getContext('2d');
            var charCompra = new Chart(varCompra,{
                type: 'line',
                data : {
                    labels : [<?php foreach($comprasmes as $reg)
                            {
                                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                $mes_traducido = strftime('%B',strtotime($reg->mes));

                                echo '"'. $mes_traducido. '",';}?>],
                    datasets:[{
                        label : 'Compras',
                        data : [<?php foreach($comprasmes as $reg)
                                {echo ''.$reg->totalmes.','; }?>],
                        borderColor: 'rgba(255,99,132,1)',
                        borderWidth: 3
                    }]
                },
                options : {
                    scales : {
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

            var varVentas = document.getElementById('ventas').getContext('2d');
            var charVentas = new Chart(varVentas,{
                type :'line',
                data : {
                    labels : [<?php foreach($ventasmes as $reg)
                            {
                                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                $mes_traducido = strftime('%B',strtotime($reg->mes));
                                echo "'".$mes_traducido. "',";}?>],
                    datasets: [{
                        label:  'Ventas',
                        data : [<?php foreach($ventasmes as $reg)
                                {echo ''.$reg->totalmes.',';}?>],
                        backgroundColor : 'rgba(20,204,20,1)',
                        borderColor : 'rgba(54,162,235,0.2)',
                        borderWidth: 1
                    }]
                },
                options : {
                    yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                    }]
                }
            });
        });
    </script>

@endsection

