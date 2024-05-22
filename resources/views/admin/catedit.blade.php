<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
        <button type="submit">Update Category</button>
    </form>
</body>
</html>
