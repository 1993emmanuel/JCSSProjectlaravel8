<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class ReportController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role_or_permission:control-maestro']);
    }

	public function index(){
		return 'este es el index';
	}

	public function reports_day(){
		$sales = Sale::whereDate('sale_date',Carbon::today('America/Mexico_City'))->get();
		$total = $sales->sum('total');
		return view('admin.report.reports_day',compact('sales','total'));
	}

	public function reports_date(){
		$sales = Sale::whereDate('sale_date',Carbon::today('America/Mexico_City'))->get();
		$total = $sales->sum('total');
		return view('admin.report.reports_date',compact('sales','total'));
		// return view('admin.report.reports_date');
	}

	public function reports_result(Request $request){
		$fi = $request->fecha_ini.' 00:00:00'; 
		$ff = $request->fecha_fin.' 23:59:59';
		$sales = Sale::whereBetween('sale_date',[$fi,$ff])->get();
		// dd($sales);
		$total = $sales->sum('total');
		// return redirect()->route('reports.date',compact('sales','total'));
		return view('admin.report.reports_date',compact('sales','total'));
	}

}
