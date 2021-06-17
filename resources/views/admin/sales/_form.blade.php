<div class="row">
    <div class="col-md-12">
        <div class="form-group">
        	<label for="client_id">Clientes</label>
        	<select id="client_id" name="client_id" class="form-control">
        		@foreach($clients as $client)
        			<option value="{{$client->id}}">{{$client->name}}</option>
        		@endforeach
        	</select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
        	<label for="tax">Impuesto</label>
        	<input type="number" name="tax" id="tax" class="form-control" placeholder="ingresa el impuesto" step="0.01">
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
        	<label for="product_id">Producto</label>
        	<select id="product_id" name="product_id" class="form-control">
        		<option value="0" selected disabled>Seleccione un producto</option>
        		@foreach($products as $product)
        			<option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
        		@endforeach
        	</select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        	<label for="stock">Stock Actual</label>
        	<input type="text" name="stock" id="stock" class="form-control" disabled value="">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
        	<label for="quantity">Cantidad</label>
        	<input type="number" name="quantity" id="quantity" placeholder="ingresa la cantidad" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        	<label for="price">Precio de Venta</label>
        	<input type="number" name="price" id="price" placeholder="Precio de compra" class="form-control" disabled>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        	<label for="discount">Porcentaje de Descuento</label>
        	<input type="number" name="discount" id="discount" placeholder="Descuento de venta" class="form-control" value="0" step="0.01">
        </div>
    </div>
</div>

<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">
        <i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar Producto
    </button>
</div>


<div class="form-group">
    <h4 class="card-title">Detalles Venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de Venta</th>
                    <th>Descuento</th>
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
                <tr >
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