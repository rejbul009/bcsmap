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
                                @if ($post->image)
                                <img src="{{ asset('upload/admin_postimage/' . $post->image) }}" class="card-img-top mb-3" alt="Post Image">
                                @endif
                                
                                <h1 class="card-title">{{ $post->title }}</h1>
                                
                                <p class="card-text">
                                  <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}
                                  &nbsp;&nbsp;&nbsp; 
                                  <i class="fas fa-user-shield"></i> {{ $post->user->name }}
                              </p>
                              <?php echo "<p class='card-text'>" . $post->content . "</p>"; ?>


                                <div class="mt-3">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary mr-2">Edit</a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.inc.footer')
        </div>
    </div>
    @include('admin.inc.script')
</body>

</html>
