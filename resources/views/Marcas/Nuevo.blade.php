@extends('Plantilla')

//Titulo
@section('titulo', 'Nuevo Marca')

//Encabezado
@section('titulo-principal', 'Nuevo Marca')
@section('descripcion-titulo-principal', 'Este es un ejemplo para mostrar como se crean nuevos registro en una tabla')
@section('boton-principal')
    @parent
@endsection
@section('enlace-boton-principal')
    {{route('MarcasNuevo')}}
@endsection
@section('texto-boton-principal', 'Nuevo Marca')

//Columna 1
@section('titulo-columna1', 'Descripcion')
@section('contenido-columna1')
    <ul>
        <li>Laravel nos ayuda a evitar los ataques CSRF, utilizando la sentencia { { csrf_field() } }
            En el inicio de cada formulario que mandemos, esta sentencia agregara un campo oculto con un TOKEN
            que validara nuestro sitio para evitar ser atacados</li>
        <li> request() función para obtener los datos.
            <ul>
            <li>- request()->all(); //Obtiene todos los datos y los regresa en un arreglo</li>
            <li>- request('Nombre'); //Obtiene el valor de la variable 'Nombre'</li>
            <li>- request()->email;//Obtiene el valor de la variable 'email'</li>
            <li>- request()->get('RTN');//Obtiene el valor de la variable 'RTN' </li>
            </ul>
        </li>
        <li> Validacion con validate <br>
            <br>
            $datos = request()->validate([<br>
                'Nombre' => 'required'<br>
            ],[<br>
                'Nombre.required' => 'El campo nombre es obligatorio'<br>
            ]);
        </li>
        <li>
            El tratamiento de los errores de validación se realiza en la misma vista de la captura se utiliza
            la variable $errors, Esta variable contiene todos los errores que se han generado en la sesión.
        </li>
    </ul>
@endsection
@section('boton-columna1', '')
@section('boton-columna3', '')
@section('enlace-boton-columna1', '')
@section('enlace-boton-columna3', '')



//Columna 2
@section('titulo-columna2', 'Nuevo Marca')
@section('contenido-columna3' , '')
@section('contenido-columna2')

    @if($errors->any())
        <div class="alert alert-danger">
        <p >Atencion!</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <form action="{{Route('MarcasCrear')}}" method="POST">
    @csrf
    <label for="Nombre">Nombre: </label>
    <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre"  maxlength="50" value="{{old('Nombre')}}"  required>
    @if ($errors->has('Nombre'))
        <p class="text-danger">{{ $errors->first('Nombre') }}</p>
    @endif
    <label for="Codigo">Codigo: </label>
    <input type="text" name="Codigo" id="Codigo" class="form-control" placeholder="Codigo"  maxlength="5" value="{{old('Codigo')}}"  required>
    @if ($errors->has('Codigo'))
        <p class="text-danger">{{ $errors->first('Codigo') }}</p>
    @endif
    <label for="ProveedorId"> Proveedor: </label>
    <select name="ProveedorId" id="ProveedorId" class="form-control" required>
        <option value="-{{old('ProveedorId')}}"> Seleccione Un Proveedor</option>
        @foreach ($Proveedores as $Proveedor)
            <option value="{{$Proveedor->ProveedorId}}"> {{$Proveedor->Nombre}} </option>  
        @endforeach
    </select>
      @if ($errors->has('ProveedorId'))
        <p class="text-danger">{{ $errors->first('ProveedorId') }}</p>
    @endif


    <button type="submit" class="btn btn-outline-success mt-3" > Crear Marca</button>

    
    
    </form>

@endsection
@section('boton-columna2', '')
@section('enlace-boton-columna2', '')
@section('pie', 'Nueva Marca')
@section('contenido-columna3' ,'')
@section('boton-columna3', '')
@section('enlace-boton-columna3', '')