@extends('Plantilla')

@section('titulo' , 'CRUD MARCAS');

@section('titulo-principal', 'Marcas')

@section('descripcion-titulo-principal', 'Tabla de Marcas')

@section('boton-principal')
    @parent
@endsection

@section('enlace-boton-principal')
    {{route('Marcas')}}
@endsection
@section('texto-boton-principal', 'Mostrar Todas')

// Columna 1 
@section('titulo-columna1', 'Mostrar Datos')
@section('contenido-columna1')
    <ul xmlns:width="http://www.w3.org/1999/xhtml">
        <li>Para mostrar todos los registros de la tabla Proveedores vamos a usar un view que utilice la plantilla blade,
            una funcion del controlador para manejar los datos y un ruta para poder accesar a la pagina.</li>
        <li>Cada campo de una consulta que origina un objeto eloquent se trata como un atributo.</li>
        <li>Cuando un objeto de eloquent es impreso en pantalla (tratado como string), se imprime una representación
            en JSON de cada usuario.</li>
    </ul>
@endsection

@section('boton-columna1', '')
@section('enlace-boton-columna1', '')

//Columna 2 
@section('titulo-columna2', 'Tabla Proveedores')
@section('contenido-columna2')
    <table class = "table table-hover table-responsive">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Ver Detalle</th>
            <th>JSON</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($Marcas as $Marca)
            <tr>
                <td>{{$Marca->Nombre}}</td>
                <td><a href="{{route('MarcasDetalle', ['Marca'=>$Marca->MarcaId])}}">Ver Detalles</a></td>
                <td>{{$Marca}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('boton-columna2', '')
@section('enlace-boton-columna2', '')
//Pie
@section('pie', 'Mostrando todos los datos de una tabla')
@section('contenido-columna3' ,'')
@section('boton-columna3', '')
@section('enlace-boton-columna3', '')