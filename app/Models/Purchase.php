<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Provider;
use App\Models\PurchaseDetails;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['provider_id','user_id','purchase_date','tax','total','status','picture'];


    //un usuario realizo una compra
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //esta compra tiene un proveedor
    public function provider(){
    	return $this->belongsTo(Provider::class);
    }

    //esta compra tiene muchos detalles de venta
    public function purchaseDetails(){
    	return $this->hasMany(PurchaseDetails::class);
    }

}