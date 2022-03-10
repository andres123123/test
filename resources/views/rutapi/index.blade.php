@extends('layout/index')

@section('contenido')


<div class="col-md-12">

    <div class="card">

        <form method="post"  action = "{{route('store')}}">
            @csrf
                    <div class="card-body">
                        
                        <div style=" text-align: center; margin: 1rem; padding: 1rem;">
                            <h2>Ingresar rut</h2>
                        </div>
         
                        <div class="form-group row">
                            <label for="rut" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">rut </label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control" id="rut" name="rut" value=""
                                    required aria-disabled="true" 
                                    style="color: white !important; background-color: #1a2035 !important; border-color: #2f374b !important;">
                            </div>
                                    
                            <div class="row">
                               <input type="submit" value="enviar" class="btn btn-danger">
                        </div>                    
                  </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="mb-4 d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('createPDF') }}">Convertir a PDF</a>
        </div>
    </div>
    <div class="card">
       <table class="table">
        <thead class="thead-dark">
          <tr> 
            <th scope="col">nombre</th>
            <th scope="col">rut</th>
            <th scope="col">genero</th>
            <th scope="col">direccion</th>
            <th scope="col">ciudad</th>
            <th scope="col">accion</th>
          </tr>
        </thead>
        <tbody>
           
            @foreach($data as $resp)
            <tr>
                <td>{{$resp->nombre}}</td>
                <td>{{$resp->rut}}</td>
                <td>{{$resp->gender}}</td>
                <td>{{$resp->address}}</td>
                <td>{{$resp->city}}</td>

                <td>
                    <a href="{{route('modificar',['rut'=>$resp->rut])}}">  <button type="button" class="btn btn-warning">modificar</button> </a>
                    <a href="{{route('destroy',['rut'=>$resp->rut])}}">  <button type="button" class="btn btn-danger">eliminar</button> </a>
                    
                 
            </td>
            
              </tr>
            @endforeach
            
        </tbody>
    </table>
    </div>
  
</div>
@endsection
