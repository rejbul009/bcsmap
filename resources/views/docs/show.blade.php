<h1>Quiz {{ $quiz_id }}</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('docs.submit', ['id' => $quiz_id]) }}" method="POST">
        @csrf

        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfaKWUYAJQjWpNgjVMop3BLEUPa7xD85ZCXnueaFmFLVuUdgA/viewform?embedded=true" width="700" height="520" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
        <button type="submit">Submit</button>
    </form>