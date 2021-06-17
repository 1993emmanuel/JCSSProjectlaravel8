<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Client;
use App\Models\saleDetail;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','user_id','sale_date','tax','total','status'];

    //la venta fue hecha por un usuario
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //la venta pertenece a un cliente
    public function client(){
    	return $this->belongsTo(Client::class);
    }

    //la venta tiene muchos detalles
    public function saleDetails(){
    	return $this->hasMany(saleDetail::class);
    }
}
