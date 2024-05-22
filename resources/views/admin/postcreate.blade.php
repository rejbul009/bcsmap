<!DOCTYPE html>
<html lang="en">
 @include('admin.inc.head')
    <body class="sb-nav-fixed">
        @include('admin.inc.topnav')
        <div id="layoutSidenav">
            @include('admin.inc.leftnav')
            <div id="layoutSidenav_content">
            <main class="container mt-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Post</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="content" class="form-label">Content:</label>
                                <textarea name="content" id="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="category">Category:</label>
        <select id="category" name="category_id">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
                            <div class="form-group mb-3">
                                <label for="images" class="form-label">Feature Image:</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                </div>
            </main>
            @include('admin.inc.footer')
        </div>
    </div>
    @include('admin.inc.script')
    
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 300, // Set the height of the editor
            });
        });
    </script>
</body>
</html>