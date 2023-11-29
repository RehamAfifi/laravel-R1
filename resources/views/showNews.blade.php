<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show news</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Show News</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>auther</th>
                    <th>Title</th>
                    <th>content</th>
                    <th>published</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $onews->auther }}</td>
                    <td>{{ $onews->title }}</td>
                    <td>{{ $onews->content }}</td>
                    <td>{{ $onews->published }}</td>

                </tr>

            </tbody>


        </table>
    </div>

</body>

</html>
