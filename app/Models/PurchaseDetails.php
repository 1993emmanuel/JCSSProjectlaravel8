<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Purchase;
use App\Models\Product;

class PurchaseDetails extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_id','product_id','quantity','price'];

    //este detalle pertenece a purchase
    public function purchase(){
    	return $this->belongsTo(Purchase::class);
    }

    //este detalle pertenece a este producto
    public function product(){
    	return $this->belongsTo(Product::class);
    }

}
