<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $primaryKey = 'ProveedorId';
    protected $table = 'Proveedores';
    protected $fillable = ['Nombre', 'Codigo', 'RTN'];


     public function marcas(){
        $this->hasMany('App\Marca');
    }

}
