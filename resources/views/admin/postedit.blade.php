<!DOCTYPE html>
<html lang="en">
 @include('admin.inc.head')
    <body class="sb-nav-fixed">
        @include('admin.inc.topnav')
        <div id="layoutSidenav">
            @include('admin.inc.leftnav')
            <div id="layoutSidenav_content">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h1>Edit Post</h1>
                                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="edit-post-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <textarea name="content" id="content" class="form-control">{{ old('content', $post->content) }}</textarea>
                                        @error('content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="post_image">Image:</label>
                                        <input type="file" name="image" id="post_image" accept="image/*" class="form-control">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @if ($post->image)
                                            <img src="{{ asset('upload/admin_postimage/' . $post->image) }}" alt="Post Image" class="img-fluid mt-2">
                                        @endif
                                        <p class="text-muted mt-2">Uploading a new image will replace the current one.</p>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
