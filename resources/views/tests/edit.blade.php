<div class="container">
    <h1>Edit Test</h1>
    <form action="{{ route('tests.update', $test) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $test->name }}" required>
        </div>
        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select class="form-control" id="subject_id" name="subject_id" required>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $test->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>