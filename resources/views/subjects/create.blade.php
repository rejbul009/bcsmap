



<!DOCTYPE html>
<html lang="en">
 @include('admin.inc.head')
    <body class="sb-nav-fixed">
        @include('admin.inc.topnav')
        <div id="layoutSidenav">
            @include('admin.inc.leftnav')
            <div id="layoutSidenav_content">
                
       <div class="container">
        <h1>Create Subject</h1>
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
               @include('admin.inc.footer')
            </div>
        </div>
        @inclue('admin.inc.script')
    </body>
</html>



     



