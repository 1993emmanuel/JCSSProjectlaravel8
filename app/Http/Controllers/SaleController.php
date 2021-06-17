<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Client;
use App\Models\Product;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;


use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;



class SaleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role_or_permission:control-maestro|vendedor']);
    }

    public function index()
    {
        $sales = Sale::get();
        return view('admin.sales.index',compact('sales'));
    }
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sales.create',compact('clients','products'));
    }
    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id' => auth()->user()->id,
            'sale_date'=>Carbon::now('America/Mexico_City'),
        ]);
        foreach($request->product_id as $key=>$sos){
            $results[]=  array('product_id'=>$request->product_id[$key], 'quantity'=>$request->quantity[$key], 'price'=>$request->price[$key], 'discount'=>$request->discount[$key]);
        }
        $sale->saleDetails()->createMany($results);
        return redirect()->route('sales.index');
    }
    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails= $sale->saleDetails;
        foreach($saleDetails as $saleDetail){
            $subtotal+=$saleDetail->quantity*$saleDetail->price - (($saleDetail->quantity * $saleDetail->price )* $saleDetail->discount / 100);
        }
        return view('admin.sales.show',compact('sale','subtotal','saleDetails'));
    }
    public function edit(Sale $sale)
    {
        // $clients = Client::get();
        // return view('admin.sale.edit',compact('sale','clients'));
    }
    public function update(UpdateRequest $request, Sale $sale)
    {
        //desactivadas
    }
    public function destroy(Sale $sale)
    {
        //desactivadas
    }

    public function pdf(Sale $sale){
        $subtotal = 0;
        $saleDetails= $sale->saleDetails;
        foreach($saleDetails as $saleDetail){
            $subtotal+=$saleDetail->quantity*$saleDetail->price - (($saleDetail->quantity * $saleDetail->price )* $saleDetail->discount / 100);
        }
        $pdf = PDF::loadView('admin.sales.pdf',compact('subtotal','saleDetails','sale'));
        return $pdf->download('Reporte_de_ventas_'.$sale->id.'.pdf');
    }

    public function print(Sale $sale){
        try{
            $subtotal = 0;
            $saleDetails= $sale->saleDetails;
            foreach($saleDetails as $saleDetail){
                $subtotal+=$saleDetail->quantity*$saleDetail->price - (($saleDetail->quantity * $saleDetail->price )* $saleDetail->discount / 100);
            }

            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);
            $printer->cut();
            $printer->close();
            return redirect()->back();
        }catch(\Throwable $th){
            return redirect()->back();
        }
    }

    public function change_status(Sale $sale){
        if($sale->status == 'VALID'){
            $sale->update(['status'=>'CANCELED']);
            return redirect()->back();
        }else{
            $sale->update(['status'=>'VALID']);
            return redirect()->back();
        }
    }

}
