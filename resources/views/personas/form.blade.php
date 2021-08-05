
<h1>{{ $modo }} persona</h1>

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="nombre">Nomnbre</label>
    <input type="text" name = "nombre" class="form-control" value="{{ isset($persona->nombre) ? $persona->nombre : '' }}" id= "nombre">
</div>
<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" name = "apellidos" class="form-control" value="{{ isset($persona->apellidos) ? $persona->apellidos : '' }}" id="apellidos">
</div>
<div class="form-group">
    <label for="apellidos">Edad</label>
    <input type="text" name = "edad" class="form-control" value="{{ isset($persona->edad) ? $persona->edad : '' }}" id = "edad">
</div>
<div class="form-group">
    <label for="sexo">sexo</label>
    <input type="text" name = "sexo" class="form-control" value="{{ isset($persona->sexo) ? $persona->sexo : '' }}" id = "sexo">
</div>
<div class="form-group">
    <label for="cp">C.P.</label>
    <input type="text" name = "cp" class="form-control" value="{{ isset($persona->cp) ? $persona->cp : '' }}" id = "cp">
</div>
<div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" name = "direccion" class="form-control" value="{{ isset($persona->direccion) ? $persona->direccion : '' }}" id = "direccion">
</div>
<input class = "btn btn-success" type="submit" value="{{$modo}} datos">
<a class = "btn btn-primary" href="{{ url('personas') }}">Regresar</a>