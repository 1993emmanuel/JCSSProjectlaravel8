<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Printer;
use App\Http\Requests\Printer\UpdateRequest;

class PrinterController extends Controller
{
    //solo las personas con control maestro pueden acceder a esta parte

	public function __construct(){
		$this->middleware('auth');
        $this->middleware(['role_or_permission:control-maestro']);
        $this->middleware(['role:control-maestro']);
	}

	public function index(){
		$printers = Printer::where('id',1)->firstOrFail();
		return view('admin.printers.index',compact('printers'));
	}

	public function update(UpdateRequest $request, Printer $printer){
		$printer->update($request->all());
		return redirect()->route('printers.index');
	}

}
