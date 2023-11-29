<!DOCTYPE html>
<html lang="en">
<head>
  <title>News List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center bg-primary">All News</h2>
  <table class="table table-hover ">
    <thead>
      <tr>
        <th>Auther Name</th>
        <th>Title</th>
        <th>Content</th>
        <th>Published</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($news as $onews)
      <tr>
        <td>{{$onews->auther}}</td>
        <td>{{$onews->title}}</td>
        <td>{{$onews->content}}</td>
        @if ($onews->published==1)
        <td>True</td>
        @else
        <td>False</td>
        @endif
        <td><a href="editNews/{{$onews->id}}">Edit</a></td>
        <td><a href="showNews/{{$onews->id}}">Show</a></td>
        <td><a href="deleteNews/{{$onews->id}}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
