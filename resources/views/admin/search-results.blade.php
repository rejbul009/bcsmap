<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Search Results</h1>
        <form action="{{ route('posts.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="searchQuery" placeholder="Search posts..." value="{{ request('searchQuery') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        
        <h2 class="mt-4">Results:</h2>
        @if($results->isEmpty())
            <p>No results found for '{{ request('searchQuery') }}'.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{ $result->id }}</td>
                            <td>{{ $result->title }}</td>
                            <td>{{ Str::limit($result->content, 100) }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $result->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $result->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
