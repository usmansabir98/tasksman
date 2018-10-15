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
        <th>Component Name</th>
        <th>Specification</th>
        <th>Cars</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($comps as $comp)
      <tr>
        <td>{{$comp->id}}</td>
        <td>{{$comp->name}}</td>
        <td>{{$comp->specification}}</td>
        <td>
          @foreach ($comp->cars as $car)
              {{$car->model}}<br>
                @foreach ($car->employees as $emp)
                  --{{$emp->name}}<br>
                @endforeach
          @endforeach
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>