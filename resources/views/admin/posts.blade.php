

<!DOCTYPE html>
<html lang="en">
 @include('admin.inc.head')
    <body class="sb-nav-fixed">
        @include('admin.inc.topnav')
        <div id="layoutSidenav">
            @include('admin.inc.leftnav')
            <div id="layoutSidenav_content">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="ml-3">
                            <h1 class="mb-4">All Posts</h1>
                            <div class="mb-3">
                                <a class="btn btn-primary mb-3" href="{{ route('posts.create') }}">Add Post</a>                              
                                    
                                <div class="container search-container">
                                    <div class="search-box">
                                        <form action="{{ route('posts.search') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="searchQuery" placeholder="Search posts..." value="{{ request('searchQuery') }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            @if ($posts->isEmpty())
                                <p>No posts found.</p>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Images</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                                </td>
                                                <td>
                                                    {{ Str::words($post->content, 30, '...') }}
                                                </td>
                                                <td>
                                                    @if ($post->image)
                                                        <img src="{{ asset('upload/admin_postimage/' . $post->image) }}" width="80" height="80" >
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $posts->links() }}
                            @endif
                        </div>
                    </div>
                </div>
               @include('admin.inc.footer')
            </div>
        </div>
        @inclue('admin.inc.script')
    </body>
</html>






















