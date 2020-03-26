@extends('Plantilla')

//Titulo
@section('titulo', 'CRUD Usando Laravel')

//Encabezado
@section('titulo-principal', 'Marcas')
@section('descripcion-titulo-principal', 'Mostrar solo un registro')
@section('boton-principal')
    @parent
@endsection
@section('enlace-boton-principal')
    {{route('Marcas')}}
@endsection
@section('texto-boton-principal', 'Mostrar Todas')

//Columna 1
@section('titulo-columna1', 'Mostrar Datos')
@section('contenido-columna1')
    <ul>
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
@section('titulo-columna2', 'Detalle de la Marca')
@section('contenido-columna2')
<table class="table table-light">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>ProveedorID</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{$Marca->Nombre}}</td>
        <td>{{$Marca->Codigo}}</td>
        <td>{{$Marca->ProveedorId}}</td>
        <td><a href="{{route('MarcasEditar', ['Marcas' => $Marca->MarcaId])}}">Editar</a></td>
        <td>
        <form action="{{Route('MarcasEliminar' , ['Marca' => $Marca->MarcaId])}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger"> Eliminar</button>
        </form>
        </td>

        
        </tr>
    </tbody>

</table>

@endsection
@section('boton-columna2', '')
@section('enlace-boton-columna2', '')

@section('contenido-columna3' ,'')
@section('boton-columna3', '')
@section('enlace-boton-columna3', '')