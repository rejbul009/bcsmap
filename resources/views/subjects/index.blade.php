
<!DOCTYPE html>
<html lang="en">
 @include('admin.inc.head')
    <body class="sb-nav-fixed">
        @include('admin.inc.topnav')
        <div id="layoutSidenav">
            @include('admin.inc.leftnav')
            <div id="layoutSidenav_content">
                <div class="container">
                    <h1>Subjects</h1>
                    <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add Subject</a>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>
                                        <a href="{{ route('subjects.show', $subject) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               @include('admin.inc.footer')
            </div>
        </div>
        @inclue('admin.inc.script')
    </body>
</html>















