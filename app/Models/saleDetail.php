<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class saleDetail extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id','product_id','quantity','price','discount',];

 	//los detalles pertenecen a un producto   
    public function product(){
    	return $this->belongsTo(Product::class);
    }
    
    
}
