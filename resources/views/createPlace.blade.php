<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create place</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Create placAdd Car</h2>
  <form action="{{route('store.place')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="Title">
    </div>
    @error('Title')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror()

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name ="description">{{old('description')}}</textarea>
      </div>
      @error('description')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror()
    <div class="form-group">
      <label for="from">from:</label>
      <input type="number" class="form-control" id="from"  placeholder="from" name="from">
    </div>
    <div class="form-group">
      <label for="from">to:</label>
      <input type="number" class="form-control" id="to"  placeholder="to" name="to">
    </div>
      <div class="form-group">
      <label for="image">image:</label>
      <input type="file" class="form-control" id="image"  placeholder="image" name="image" value="{{old('image')}}">
    </div>
    @error('image')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror()
           
    <button type="submit" class="btn btn-default">Create</button>
  </form>
</div>

</body>
</html>
