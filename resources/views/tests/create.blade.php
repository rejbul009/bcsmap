<div class="container">
    <h1>Create Test</h1>
    <form action="{{ route('tests.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select class="form-control" id="subject_id" name="subject_id" required>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="questions-container">
            <div class="question-group">
                <div class="form-group">
                    <label for="questions[0][text]">Question 1</label>
                    <input type="text" class="form-control" id="questions[0][text]" name="questions[0][text]" required>
                </div>
                <div class="choices-container">
                    <div class="form-group">
                        <label for="questions[0][choices][0][text]">Choice 1</label>
                        <input type="text" class="form-control" id="questions[0][choices][0][text]" name="questions[0][choices][0][text]" required>
                        <input type="hidden" name="questions[0][choices][0][is_correct]" value="0">
                        <label>
                            <input type="radio" name="questions[0][answer]" value="0" required> Correct
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="questions[0][choices][1][text]">Choice 2</label>
                        <input type="text" class="form-control" id="questions[0][choices][1][text]" name="questions[0][choices][1][text]" required>
                        <input type="hidden" name="questions[0][choices][1][is_correct]" value="0">
                        <label>
                            <input type="radio" name="questions[0][answer]" value="1" required> Correct
                        </label>
                    </div>
                    <!-- Add more choices as needed -->
                </div>
                <button type="button" class="btn btn-secondary" onclick="addChoice(this)">Add Another Choice</button>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addQuestion()">Add Another Question</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    let questionIndex = 1;

    function addQuestion() {
        const questionsContainer = document.getElementById('questions-container');
        const newQuestionDiv = document.createElement('div');
        newQuestionDiv.classList.add('question-group');
        newQuestionDiv.innerHTML = `
            <div class="form-group">
                <label for="questions[${questionIndex}][text]">Question ${questionIndex + 1}</label>
                <input type="text" class="form-control" id="questions[${questionIndex}][text]" name="questions[${questionIndex}][text]" required>
            </div>
            <div class="choices-container">
                <div class="form-group">
                    <label for="questions[${questionIndex}][choices][0][text]">Choice 1</label>
                    <input type="text" class="form-control" id="questions[${questionIndex}][choices][0][text]" name="questions[${questionIndex}][choices][0][text]" required>
                    <input type="hidden" name="questions[${questionIndex}][choices][0][is_correct]" value="0">
                    <label>
                        <input type="radio" name="questions[${questionIndex}][answer]" value="0" required> Correct
                    </label>
                </div>
                <div class="form-group">
                    <label for="questions[${questionIndex}][choices][1][text]">Choice 2</label>
                    <input type="text" class="form-control" id="questions[${questionIndex}][choices][1][text]" name="questions[${questionIndex}][choices][1][text]" required>
                    <input type="hidden" name="questions[${questionIndex}][choices][1][is_correct]" value="0">
                    <label>
                        <input type="radio" name="questions[${questionIndex}][answer]" value="1" required> Correct
                    </label>
                </div>
                <!-- Add more choices as needed -->
            </div>
            <button type="button" class="btn btn-secondary" onclick="addChoice(this)">Add Another Choice</button>
        `;
        questionsContainer.appendChild(newQuestionDiv);
        questionIndex++;
    }

    function addChoice(button) {
        const questionGroup = button.closest('.question-group');
        const choicesContainer = questionGroup.querySelector('.choices-container');
        const choiceIndex = choicesContainer.children.length;

        const newChoiceDiv = document.createElement('div');
        newChoiceDiv.classList.add('form-group');
        newChoiceDiv.innerHTML = `
            <label for="questions[${questionIndex - 1}][choices][${choiceIndex}][text]">Choice ${choiceIndex + 1}</label>
            <input type="text" class="form-control" id="questions[${questionIndex - 1}][choices][${choiceIndex}][text]" name="questions[${questionIndex - 1}][choices][${choiceIndex}][text]" required>
            <input type="hidden" name="questions[${questionIndex - 1}][choices][${choiceIndex}][is_correct]" value="0">
            <label>
                <input type="radio" name="questions[${questionIndex - 1}][answer]" value="${choiceIndex}" required> Correct
            </label>
        `;
        choicesContainer.appendChild(newChoiceDiv);
    }
</script>
