@extends('layout/index')

@section('contenido')
<div class="col-md-12">

    <div class="card">
        <table class="table">
     @foreach($data as $resp)               
<form method="post" action="{{route('update')}}">
    {{csrf_field()}}

    <div class="form-group">
      <label for="rut">rut</label>
      <input type="text" class="form-control" id="rut" name="rut" value="{{$resp->rut}}" readonly="readonly" >
    </div>
    <div class="form-group">
      <label for="name">nombre</label>
      <input type="text" class="form-control"  id="name" name="name" value="{{$resp->nombre}}"readonly="readonly" >
    </div>
    <div class="form-group">
        <label for="genero">genero</label>
        <input type="text" class="form-control"  id="gender" name="gender" value="{{$resp->gender}}"readonly="readonly" >
      </div>
      <div class="form-group">
        <label for="direccion">direccion</label>
        <input type="text" class="form-control"  id="address" name="address" value="{{$resp->address}}">
      </div>  
      <div class="form-group">
        <label for="city">ciudad</label>
        <input type="text" class="form-control"  id="city" name="city" value="{{$resp->city}}">
      </div>    
    
        
    <button type="submit" class="btn btn-primary">enviar</button>
  </form>
@endforeach
    </div>

  
</div>
@endsection
