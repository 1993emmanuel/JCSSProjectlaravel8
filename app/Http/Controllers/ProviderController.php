<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

use Illuminate\Support\Str;

class ProviderController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role_or_permission:control-maestro|altas_lvl1']);
    }

    public function index()
    {
        $providers = Provider::get();
        return view('admin.providers.index',compact('providers'));
    }
    public function create()
    {
        return view('admin.providers.create');
    }
    public function store(StoreRequest $request)
    {
        Provider::create($request->all()+[
            'slug'=>Str::slug($request->name,'-'),
        ]);
        return redirect()->route('providers.index');
    }
    public function show(Provider $provider)
    {
        return view('admin.providers.show',compact('provider'));
    }
    public function edit(Provider $provider)
    {
        return view('admin.providers.edit',compact('provider'));
    }
    public function update(UpdateRequest $request, Provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index');
    }
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
    }
}