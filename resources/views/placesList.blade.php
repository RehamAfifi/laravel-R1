<!DOCTYPE html>
<html lang="en">
<head>
  <title>Places List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center bg-primary">All places</h2>
  <table class="table table-hover ">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>from</th>
        <th>To</th>
        <th>image</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($places as $place)
      <tr>
        <td>{{$place->Title}}</td>
        <td>{{$place->description}}</td>
        <td>{{$place->from}}</td>
        <td>{{$place->to}}</td>
       <td><div class="w-30"> {{$place->image}}</div></td>

        <td><a href="editPlace/{{$place->id}}">Edit</a></td>
        <td><a href="showPlace/{{$place->id}}">Show</a></td>
        <td><a href="deletePlace/{{$place->id}}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
