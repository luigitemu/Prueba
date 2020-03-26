<?php

use Illuminate\Database\Seeder;
use App\Proveedor;
use App\Marca;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $proveedores =\App\Proveedor::get(['ProveedorId']);
        
        foreach ($proveedores as $ProveedorId =>$id ){
            factory(\App\Marca::class , 3 )->create([
                'ProveedorId' => $id
            ]);
        }
    }
}
