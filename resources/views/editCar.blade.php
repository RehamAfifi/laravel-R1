
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update Car</h2>
  <form action="{{ route('updateCar',$car->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="carTitle" value="{{$car->carTitle}}">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price"  placeholder="Enter Price" name="price" value="{{$car->price}}">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name ="description" >{{$car->description}}</textarea>
      </div>
      <div class="form-group">
      <label for="image">image:</label>
      <input type="file" class="form-control" id="image"  placeholder="image" name="image">
    </div>
    <div class="form-group">
      <img  src="{{url('assets/images/'. $car->image)}}" alt="{{$car->carTitle}}">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" value="published" @checked($car->published)> Published</label>
    </div>
    <div class="form-group">
        <label for="category">category:</label>
        <select name="category_id">
            @foreach($categories as $category)
        <option  {{$category->id == $car->category_id? 'selected' : ''}} value="{{$category->id}}">{{$category->categoryName}}</option>
       @endforeach
     </select> </div>
    <button type="submit" class="btn btn-default">Edit</button>
    
  </form>
</div>

</body>
</html>
