<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Hurray, first output in the view.</h1>
    <p>{{ $nexus['title'] }}</p>
    <br>
    <h3>Here is a list of records from the database</h3>
    <ol>
        @foreach ($posts as $post)
            <li>{{ $post['name'] }}</li>
        @endforeach
    </ol>
</body>
</html>