
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update News</h2>
  <form action="{{ route('updateNews',$onews->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="auther">Auther Name</label>
        <input type="text" class="form-control" id="auther" placeholder="auther" name="auther" value="{{$onews->auther}}">
      </div>
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$onews->title}}">
    </div>
    <div class="form-group">
        <label for="description">Content:</label>
        <textarea class="form-control" rows="5" id="content" name ="content" >{{$onews->content}}</textarea>
      </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" value="published" @checked($onews->published)> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Edit</button>
  </form>
</div>

</body>
</html>
