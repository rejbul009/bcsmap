<!DOCTYPE html>
<html lang="en">

    @include('user.inc.head')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
       

<body>

    @include('user.inc.topbar')
    @include('user.inc.nav')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="ml-3">
                <h1 class="mb-4">Category Posts</h1>
                <div class="mb-3">
                        
                    <div class="container search-container">
                        <div class="search-box">
                            <form action="{{ route('userposts.search') }}" method="GET">
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
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{ route('user.post', $post->id) }}">{{ $post->title }}</a>
                                    </td>
                                   
                                  
                                       
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    @include('user.inc.footer')

   

    @include('user.inc.script')

</body>
</html>
