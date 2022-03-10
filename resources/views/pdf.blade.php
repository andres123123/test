
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://bootswatch.com/4/darkly/bootstrap.min.css" rel="stylesheet">
    <style>
    .table .thead-dark th {
      color: black;
      background-color: white;
      
  }
  .table td, .table th {
    color: black;
    background-color: #ffffff;
    border: solid 1px black;
  }
  body {
  
    background-color: #ffffff;
 
}


</style>
</head>
<body>
      <table class="table" >
        <thead class="thead-dark">
          <tr> 
            <th scope="col">nombre</th>
            <th scope="col">rut</th>
            <th scope="col">genero</th>
            <th scope="col">direccion</th>
            <th scope="col">ciudad</th>
          </tr>
        </thead>
        <tbody>
           
            @foreach($respuesta as $resp)
            <tr>
                <td>{{$resp->nombre}}</td>
                <td>{{$resp->rut}}</td>
                <td>{{$resp->gender}}</td>
                <td>{{$resp->address}}</td>
                <td>{{$resp->city}}</td>
            
              </tr>
            @endforeach
            
        </tbody>
    </table>
    
  
</body>
</html>

</body>
</html>