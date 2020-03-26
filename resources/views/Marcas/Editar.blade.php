@extends('Plantilla')

//Titulo
@section('titulo', 'Editar Marca')

//Encabezado
@section('titulo-principal', 'Editar Marca')
@section('descripcion-titulo-principal', 'Este es un ejemplo para mostrar como se editan registros de una tabla')
@section('boton-principal')
    @parent
@endsection
@section('enlace-boton-principal')
    {{route('MarcasEditar', ['Marca' => $Marca->MarcaId])}}
@endsection
@section('texto-boton-principal', 'Editar Marca')

//Columna 1
@section('titulo-columna1', 'Descripcion')
@section('contenido-columna1')
    <ul>
        <li>Crear un nuevo view con los datos de la view crear <br>
            en los valores de cada campo cargar los valores del proveedor <br>
            value="{ { old('Codigo', $Proveedor->Codigo) } }" <br>
            enviar como segundo parámetro el valor que se espera aparesca en el campo.
        </li>
        <li>Crear una nueva ruta de método Put</li>
        <li>Para enviar el form que lleva los datos a actualizar hay que mandarlos bajo el método put, <br>
            pero los form solo pueden tener El método get o post <br>
            por lo cual agregaremos el método con la función method_field, <br>
            la cual agrega un campo oculto a nuestro form. <br>
            {{'<form method="POST" action="">'}} <br>
            {{'{ { method_field(\'PUT\')} }'}}
        </li>
    </ul>
@endsection
@section('boton-columna1', '')
@section('enlace-boton-columna1', '')

//columna 2 
@section('titulo-columna2', 'Editar Marca')

@section('contenido-columna2')
    @if($errors->any())
        <div class="alert alert-danger">
            <p>Atencion!</p>
            <ul>
              @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach  
            </ul>

        </div>
    @endif
    <br>
    <form action="{{Route('MarcasActualizar' , ['Marca' => $Marca] )}}" method="POST">
        @method('PUT')
        @csrf
        <label for="Nombre"> Nombe: </label>
        <input type="text" name="Nombre" id="Nombre" maxlength="50" class="form-control" value="{{old('Nombre', $Marca->Nombre) }}" required>
        @if ($errors->has('Nombre'))
            <p class="text-danger">{{ $errors->first('Nombre') }}</p>
        @endif
        <label for="Codigo"> Codigo: </label>
        <input type="text" name="Codigo" id="Codigo" maxlength="5" class="form-control" value="{{old('Codigo', $Marca->Codigo) }}" required>
        @if ($errors->has('Codigo'))
            <p class="text-danger">{{ $errors->first('Codigo') }}</p>
        @endif
        <label for="ProveedorId mt-3"> Proveedor: </label>
        <select name="ProveedorId" id="ProveedorId" class="form-control">
            <option value="{{old('ProveedorId', $Proveedor->ProveedorId) }}">{{$Proveedor->Nombre}} </option>
            @foreach ($Proveedores as $Proveedor)
                <option value="{{$Proveedor->ProveedorId}}">{{$Proveedor->Nombre}}</option>
            @endforeach
        </select>



        @if ($errors->has('ProveedorId'))
            <p class="text-danger">{{ $errors->first('ProveedorId') }}</p>
        @endif
        <button type="submit" class="btn btn-outline-primary mt-3">Actualizar Marca</button>



    </form>


@endsection
@section('boton-columna2', '')
@section('enlace-boton-columna2', '')
@section('pie', 'Editar Marcas')
@section('contenido-columna3' ,'')
@section('boton-columna3', '')
@section('enlace-boton-columna3', '')