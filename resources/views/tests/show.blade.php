<div class="container">
    <h1>{{ $test->name }}</h1>
    <h3>Subject: {{ $test->subject->name }}</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tests.submit', ['test' => $test->id]) }}" method="POST">
        @csrf
        @foreach ($test->questions as $question)
            <div class="card mb-3">
                <div class="card-header">
                    Question: {{ $question->question_text }}
                </div>
                <div class="card-body">
                    <input type="hidden" name="questions[{{ $question->id }}]" value="{{ $question->id }}">
                    @foreach ($question->choices as $choice)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}" id="choice{{ $choice->id }}">
                            <label class="form-check-label" for="choice{{ $choice->id }}">
                                {{ $choice->choice_text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit Answers</button>
    </form>
</div>
