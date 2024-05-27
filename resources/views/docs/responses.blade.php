<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Form Responses</title>
</head>
<body>
    <h1>Google Form Responses</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->user_name }}</td>
                <td>{{ $result->answer }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
