<div class="row">
    <div class="col-6">
        <div class="form-group">
        	<label for="provider_id">Proveedor</label>                        	
        	<select class="form-control" name="provider_id" id="provider_id">
        		@foreach($providers as $provider)
        			<option value="{{$provider->id}}">{{$provider->name}}</option>
        		@endforeach
        	</select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="product_id">Producto</label>                            
            <select class="form-control" name="product_id" id="product_id">
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>        
    </div>
</div>

<div class="row">
    <div class="col-4">
        <label for="tax">Impuesto</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" name="tax" id="tax" class="form-control" aria-describedby="basic-addon3">
        </div>
    </div>
    <div class="col-4">
        <label for="quantity">Cantidad</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon4">Pz</span>
            </div>
            <input type="number" name="quantity" id="quantity" class="form-control" aria-describedby="basic-addon4">
        </div>
    </div>
    <div class="col-4">
        <label for="price">Precio</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon5">$(MX)</span>
            </div>
            <input type="number" name="price" id="price" class="form-control" aria-describedby="basic-addon5">
        </div>
{{--         <div class="form-group">
            <label for="price">Precio de Compra</label>
            <input type="number" name="price" id="price" placeholder="Precio de compra" class="form-control">
        </div> --}}
    </div>
</div>

{{-- <div class="form-group">
    <label for="quantity">Cantidad</label>
    <input type="number" name="quantity" id="quantity" placeholder="ingresa la cantidad" class="form-control">
</div>

<div class="form-group">
	<label for="tax">Impuesto</label>
	<input type="number" name="tax" id="tax" placeholder="ingresa el impuesto" class="form-control">
</div> --}}


<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">
        <i class="fa fa-shopping-cart"></i> Agregar Producto
    </button>
</div>


<div class="form-group">
    <h4 class="card-title">Detalles Compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL : </p>
                    </th>
                    <th><p align="right"><span id="total">MX:0.00</span></p></th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO 18%</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">MX: 0.00</span></p>
                    </th>
                </tr>
                <tr>
                   <th colspan="4">
                       <p align="right">TOTAL A PAGAR</p>
                   </th>
                   <th>
                       <p align="right">
                           <span align="right" id="total_pagar_html">MX: 0.00</span>
                           <input type="hidden" name="total" id="total_pagar">
                       </p>
                   </th>
                </tr>
            </tfoot>
            <tbody></tbody>
        </table>
    </div>
</div>

