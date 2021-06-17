@extends('layouts.admin')
@section('title','Editar Categoria')

@section('styles')
	{{-- CSS adicionales --}}
@endsection

@section('create')
<li class="nav-item d-none d-lg-block">
	<a href="{{route('categories.index')}}" class="nav-link">
		<span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver Categorias</span>
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
				Editar Categoria
			</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a href="{{route('categories.index')}}">Categorias</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Editar Categorias</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Categorias</h4>
                        </div>

                        {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
							<div class="form-group">
								<label for="name">Nombre</label>
								<input type="text" name="name" id="name" class="form-control"required value="{{$category->name}}">
							</div>

							<div class="form-group">
								<label for="description">Descripcion</label>
								<textarea rows="3" class="form-control" name="description" id="description">{{$category->description}}</textarea>
							</div>
                        <button type="submit" class="btn btn-primary mr-2">Editar Categoria</button>
                        <a class="btn btn-light mr-2" href="{{route('categories.index')}}">
                        	<i class="fa fa-ban" aria-hidden="true"></i> Cancelar
                        </a>
                        {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

