<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Str;
use App\Models\Product;

class Provider extends Model
{
    use HasFactory;
    use SoftDeletes;

   	protected $fillable = ['name','email','ruc_number','address','phone','slug'];

   	public function getRouteKeyName(){
   		// return $this->getKeyName();
   		// Str::slug('Laravel 5 Framework', '-');
   		// return Str::slug('name','-');
   		return 'slug';
   	}

   	//proveedor tiene muchso porductos
   	public function products(){
   		return $this->hasMany(Product::class);
   	}

   	
   	
}
