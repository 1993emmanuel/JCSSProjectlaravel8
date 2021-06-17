<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sale;
use App\Models\saleDetail;
use App\Models\Product;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','dni','ruc','address','phone','email'];

    public function salesbyClient(){
        return $this->hasMany(Sale::class);
    }

    // public function ventabyDetails(){
    //     return $this->belongsToMany(saleDetail::class);
    // }

    public function saleDetails(){
        return $this->belongsTo(saleDetail::class);
    }

    public function ventabyDetails(){
        return $this->hasMany(saleDetail::class);
    }

    public function detailsbyProducts(){
        return $this->hasMany(Product::class);
    }

   	// public function getRouteKeyName(){
   	// 	// return $this->getKeyName();
   	// 	// Str::slug('Laravel 5 Framework', '-');
   	// 	// return Str::slug('name','-');
   	// 	return 'email';
   	// }

}
