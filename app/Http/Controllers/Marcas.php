<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;

class Marcas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('Marcas.marcas' , [
            'Marcas' => $marcas
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores = Proveedor::all();
        return view('Marcas.Nuevo' , [ 'Proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $Datos= request()->validate([
            'Nombre'=> 'required|max:50|unique:Marcas,Nombre',
            'Codigo'=>'required|unique:Marcas,Codigo|max:5',
            'ProveedorId'=>'required'
        ],[
            'Nombre.required'=>'Campo Nombre es Obligatorio',
            'Nombre.unique'=>'Este Valor ya ha sido Tomado',
            'Nombre.max'=>'Campo Nombre solo puede tener maximo 50 caracteres',
            'Codigo.required'=>'Campo Codigo es Obligatorio',
            'Codigo.unique'=>'Este Valor ya ha sido Tomado',
            'Codigo.max'=>'Campo Codigo solo puede tener maximo 5 caracteres',
            'ProveedorId.required'=>'Campo Proveedor es Obligatorio'
        ]);

        $Marca= Marca::create([
            'Nombre'=> $Datos['Nombre'], 
            'Codigo'=> $Datos['Codigo'], 
            'ProveedorId'=> $Datos['ProveedorId'], 
            ]);

        return view('Marcas.Detalle' ,[
            'Marca' => $Marca
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $marca = Marca::findOrFail($id); 
        return view('Marcas.Detalle' ,[
            'Marca' => $marca
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedores = Proveedor::all();
        $marca = Marca::findOrfail($id);
        $proveedor = Proveedor::findOrFail($marca->ProveedorId);
        return view('Marcas.Editar' , [
            'Marca' => $marca,
            'Proveedores' => $proveedores,
            'Proveedor' => $proveedor,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Marca $Marca)
    {

        //
        $Datos = request()->validate([
            'Nombre' => 'required|max:50',
            'Codigo'=>['required' ,
                       Rule::unique('Marcas')->ignore($Marca->MarcaId , 'MarcaId'),
                    //    Rule::unique('Proveedores')->ignore($Proveedor->ProveedorId, 'ProveedorId'),
                       'max:5'],
            'ProveedorId' => 'required'
        ],[
            'Nombre.required'=>'Campo Nombre es obligatorio!',
            'Nombre.max'=>'Campo Nombre solo debe tener 50 carateres!',
            'Codigo.required'=>' Campo Codigo es obligatorio!',
            'Codigo.unique'=>'Codigo ya fue utilicado',
            'Codigo.max'=>'Campo codigo solo debe tener 50 carateres!',
            'ProveedorId.required'=>'Campo ProveedorId es obligatorio!',

        ]
    );

    $Marca->update($Datos);
    return view('Marcas.Detalle' , ['Marca' => $Marca] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $marca = Marca::findOrFail($id);
        // $marca->delete();
        Marca::destroy($id);
        return redirect()->route('Marcas');


    }
}
