<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Ingrese nombre del usuario" required>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="email">Correo Electronico</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Ingresa el correo electronico" required>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="password">Contraseña</label>
			<input type="password" name="password" id="password" class="form-control" placeholder="Ingresa la contraseña" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="username">Nombre de usuario</label>
			<input type="text" name="username" id="username" class="form-control" placeholder="Ingresa tu nombre de usuario" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="role">Listado de roles</label>
			<select name="role" id="role" class="form-control">
				<option value="0" selected disabled>seleccione un rol</option>
				@foreach( $roles as $key=>$value)
					<option value="{{$key}}">{{$value}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>