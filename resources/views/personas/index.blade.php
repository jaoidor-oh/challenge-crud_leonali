@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif
<a href="{{ url('personas/create') }}" class="btn btn-success">Registrar nueva persona</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>CP</th>
            <th>Dirección</th>
            <th>Accciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($personas as $persona)
        <tr>
            <td>{{$persona->id}}</td>
            <td>{{$persona->nombre}}</td>
            <td>{{$persona->apellidos}}</td>
            <td>{{$persona->edad}}</td>
            <td>{{$persona->sexo}}</td>
            <td>{{$persona->cp}}</td>
            <td>{{$persona->direccion}}</td>
            <td>
                <a href="{{ url('/personas/'.$persona->id. '/edit') }}" class= "btn btn-warning">
                Editar
                </a>
                 |
                <form action="{{ url('/personas/'.$persona->id ) }}" class = "d-inline" method ="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onClick="return confirm('Realmente quieres borrar?')" value="Borrar" class=" btn btn-danger">
                </form>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
</div>
@endsection