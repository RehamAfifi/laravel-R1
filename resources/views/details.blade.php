<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Car Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>published</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $title }}</td>
                    <td>{{ $price }}</td>
                    <td>{{ $description }}</td>
                    <td>{{ $published_str }}</td>

                </tr>

            </tbody>


        </table>
    </div>

</body>

</html>
