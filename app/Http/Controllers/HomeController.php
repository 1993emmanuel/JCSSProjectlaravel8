<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Business;

class HomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $comprasmes = DB::select('
            SELECT monthname(c.purchase_date) as mes , sum(c.total) as totalmes from purchases c where c.status="ACTIVE" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12
            ');

        // dd($comprasmes);

        $ventasmes = DB::select('
            SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status = "VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12
            ');

        // dd($ventasmes);

        $ventasdia = DB::select('
            SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where status = "VALID" group by v.sale_date order by day(v.sale_date) desc limit 15
            ');

        // dd($ventasdia);

        $totales = DB::select('
            SELECT(select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="ACTIVE") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALID") as totalventa
            ');

        // dd($totales);

        $productosvendidos = DB::select('
            SELECT p.code as code,
                sum(dv.quantity) as quantity, p.name as name, p.id as id, p.stock as stock from products p
                inner join sale_details dv on p.id = dv.product_id
                inner join sales v on dv.sale_id = v.id where v.status = "VALID" and year(v.sale_date) = year(curdate())
                group by p.code, p.name, p.id, p.stock order by sum(dv.quantity) desc limit 10
            ');

        // dd($productosvendidos);

        return view('home',compact('comprasmes','ventasmes','ventasdia','totales','productosvendidos'));
    }


}
