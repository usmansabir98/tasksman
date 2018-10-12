<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Cars</th>
        
      </tr>
    </thead>
    <tbody>
      
      @foreach($emps as $emp)
      <tr>
        <td>{{$emp->id}}</td>
        <td>{{$emp->name}}</td>
        <td>{{$emp->email}}</td>
        <td>
          @foreach ($emp->cars as $car)
              {{$car->model}}<br>
          @endforeach
        </td>

        
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>