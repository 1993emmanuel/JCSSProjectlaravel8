<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;

use App\Models\Sale;
use App\Models\saleDetail;
use App\Models\Product;

class ClientController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
        $this->middleware(['role_or_permission:control-maestro|altas_lvl1|vendedor|compras']);
    }

    public function index()
    {
        $clients = Client::get();
        return view('admin.clients.index',compact('clients'));
    }
    public function create()
    {
        return view('admin.clients.create');
    }
    public function store(StoreRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('clients.index');
    }
    public function show(Client $client)
    {
        $detallesVeta=[];
        $sales = Sale::where('client_id',$client->id)->get();
        foreach($sales as $sale){
            $detallesVeta[] = saleDetail::where('sale_id',$sale->id)->get();
        }
        // dd($detallesVeta);
        return view('admin.clients.show',compact('client','sales','detallesVeta'));
    }
    public function edit(Client $client)
    {
        return view('admin.clients.edit',compact('client'));
    }
    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('clients.index');
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }
}
