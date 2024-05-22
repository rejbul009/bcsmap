
<!DOCTYPE html>
<html lang="en">
@include('user.inc.head')

<body>
 
  @include('user.inc.topbar')
  @include('user.inc.nav')
  
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
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td><a href="{{ route('user.post', $result->id) }}">{{ $result->title }}</a></td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
  @include('user.inc.footer')
  @include('user.inc.script')

</body>

</html>






































