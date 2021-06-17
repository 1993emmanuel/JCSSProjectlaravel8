<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

use App\Models\Provider;
use App\Models\Product;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade as PDF;

class PurchaseController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role_or_permission:control-maestro|comprador']);
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchases.index',compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status','ACTIVE')->get();
        return view('admin.purchases.create',compact('providers','products'));
    }
    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all()+[
            'user_id'=>auth()->user()->id,
            'purchase_date'=>Carbon::now('America/Mexico_City'),
        ]);
        foreach($request->product_id as $key=>$sos){
            $results[]=  array('product_id'=>$request->product_id[$key], 'quantity'=>$request->quantity[$key], 'price'=>$request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }
    public function show(Purchase $purchase)
    {   
        $subtotal = 0;
        $purchaseDetails= $purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal+=$purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchases.show',compact('purchase','purchaseDetails','subtotal'));
    }
    public function edit(Purchase $purchase)
    {
        // $providers = Provider::get();
        // return view('admin.purchases.edit',compact('providers','purchase'));
    }
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        //funcion deshabilitada
    }
    public function destroy(Purchase $purchase)
    {
        //funcion deshabilitada
    }

    public function pdf(Purchase $purchase){
        $subtotal = 0;
        $purchaseDetails= $purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal+=$purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchases.pdf',compact('subtotal','purchaseDetails','purchase'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
    }


    public function upload(Request $request ,Purchase $purchase){

    }

    public function change_status(Purchase $purchase){

        if($purchase->status == 'ACTIVE'){
            $purchase->update(['status'=>'CANCELED']);
            return redirect()->back();
        }else{
            $purchase->update(['status'=>'ACTIVE']);
            return redirect()->back();
        }

    }

}
