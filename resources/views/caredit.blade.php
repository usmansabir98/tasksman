<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel MongoDB CRUD Tutorial With Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
  <body>
    <div class="container">
      <h2>Edit A Form</h2><br/>
      <div class="container">
    </div>
      <form method="post" action="{{action('CarController@update', $id)}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Carcompany">Car Company:</label>
            <input type="text" class="form-control" name="carcompany" value="{{$car->carcompany}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Model">Model:</label>
            <input type="text" class="form-control" name="model" value="{{$car->model}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Price">Price:</label>
            <input type="text" class="form-control" name="price" value="{{$car->price}}">
          </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <p>Employees:</p>
              @foreach ($employees as $emp)
                {{-- <option value="{{ $emp->id }}">{{ $emp->name }}</option> --}}
                <label for="emps[]" class="container">
                  <input type="checkbox" name="emps[]" value={{$emp->id}}
                  @if (in_array($emp->id, $car->employee_ids))
                      checked="checked"
                  @endif
                  >
                    {{$emp->name}}
                </label>
              @endforeach
            </div>
          </div>
  
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <p>Components:</p>
              @foreach ($components as $comp)
                {{-- <option value="{{ $emp->id }}">{{ $emp->name }}</option> --}}
                <label for="comps[]" class="container">
                  <input type="checkbox" name="comps[]" value={{$comp->id}}
                  @if (in_array($comp->id, $car->component_ids))
                      checked="checked"
                  @endif
                  >
                    {{$comp->name}}
                </label>
              @endforeach
            </div>
          </div>


        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
   </div>
  </body>
</html>