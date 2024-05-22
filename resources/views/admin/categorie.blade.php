<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name">
    <button type="submit">Create Category</button>
</form>