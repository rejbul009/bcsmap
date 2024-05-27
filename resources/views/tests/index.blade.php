<div class="container">
    <h1>Tests</h1>
    <a href="{{ route('tests.create') }}" class="btn btn-primary">Add Test</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tests as $test)
                <tr>
                    <td>{{ $test->name }}</td>
                    <td>{{ $test->subject->name }}</td>
                    <td>
                        <a href="{{ route('tests.show', $test) }}" class="btn btn-info">View</a>
                        <a href="{{ route('tests.edit', $test) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tests.destroy', $test) }}" method="POST" style="display:inline-block;">
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